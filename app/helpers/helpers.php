<?php

use App\Mail\MailSender;
use App\Models\Falcon;
use App\Models\OfficeAgentPayment;
use App\Models\TenderBuyer;
use App\Models\TenderCompanySubscription;
use App\Models\Violation;
use App\Models\ViolationCertificate;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Logger\Concretes\Logger;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

/**
 * return message...
 *
 * @param bool $status
 * @param string|null $msg
 * @param array $data
 * @return array|null
 */
function return_msg(bool $status = false, string $msg = null, array $data = []): ?array
{
    return ['status' => $status, 'msg' => $msg, 'data' => $data];
}

function logger_action(Model $model, string $action = null, array $logger_data = null)
{
    $data = [
        "action" => $action,
        "logger_data" => $logger_data
    ];
    $logger = (new Logger)->store($model, $data);
    $logger->makeHidden(['logerable']);
    $data = encode_arr($logger);
    broadcast(new \App\Events\LoggerEvent($data));

}

function logger_action_no_realtime(Model $model, string $action = null, array $logger_data = null)
{
    $data = [
        "action" => $action,
        "logger_data" => $logger_data
    ];
    (new Logger)->store($model, $data);
}


function custom_paginate($collection, $limit = 20)
{
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $itemCollection = collect($collection);
    $perPage = $limit;
    $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
    $collection = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
    $collection->setPath(request()->url());

    return $collection;
}

function uploadFile($file, $path)
{
    $data['name'] = rand() . time() . '.' . $file->getClientOriginalExtension();
    $data['mime_type'] = $file->getClientMimeType();
    $data['extension'] = $file->getClientOriginalExtension();
    $data['size'] = $file->getClientSize();

//    Storage::disk('azure')->put("files/$path/" . $data['name'], file_get_contents($file));

    $file->move(storage_path('files/' . $path), $data['name']);
    return $data;
}

function getFullPath($file, $path)
{
    if (isset($file['name'])) {
//        $file['name'] = Storage::disk('azure')->url("files/$path/" . $file['name']);

        $file['name'] = asset('storage/files/') . '/' . $path . '/' . $file['name'];
    }
    return $file;
}

function getFullPathEdit($file_name, $path)
{
    if ($file_name) {
//        return Storage::disk('azure')->url("files/$path/" . $file_name);

        return asset('storage/files/') . '/' . $path . '/' . $file_name;
    }
    return null;
}

function getFullPathArray($files, $path)
{
    foreach ($files as $key => $file) {
        $file['name'] = Storage::disk('azure')->url("files/$path/" . $file['name']);

//        $file['name'] = asset('storage/files/') . '/' . $path . '/' . $file['name'];
        $files[$key] = $file;
    }
    return $files;

}

function isImage($extension)
{
    if (in_array($extension, ['jpg', 'png', 'jpeg'])) {
        return 1;
    }
    return 0;
}

function encode_arr($data)
{
    return base64_encode(json_encode($data));
}

function decode_arr($data)
{
    return json_decode(base64_decode($data));
}


function getSetting($name)
{
    $setting = new \App\Modules\Setting\Setting();
    return $setting->getSettingValue($name);
}

function send_email($data)
{


//    try {
    Mail::to($data['to'])
        ->send(new MailSender($data['content'], $data['template']));
//    } catch (\Exception $exception) {

//    }

}

function send_sms(array $data = [])
{
    try {
        $sms_username = getConfig('SmsUserName');
        $sms_password = getConfig('SmsPassword');
        $sms_url = 'https://api.mpp-sms.com/api/send.aspx';

        // $phone = ($data['prefix'] ?? 965) . ($data['mobile'] ?? $data['phone'] ?? '96078260');
        $phone = ($data['prefix'] ?? 965) . ($data['mobile'] ?? $data['phone']);
        // $phone = ($data['prefix'] ?? 965) . '96078260';
        $message = $data['message'];
        // dd($data['message']);

        $postData = "username=$sms_username&password=$sms_password&language=2&sender=EPA%20Kuwait&mobile=$phone&message=$message";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $sms_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count(explode(' & ', $postData)));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output = curl_exec($ch);

        curl_close($ch);
    } catch (\Exception $exception) {

    }

    // dd($output);
    return $output;
}


function captcha_helper($request_data)
{
    if (getConfig('GOOGLE_RECAPTCHA_KEY')) {
        return validator($request_data, [
            'g-recaptcha-response' => 'required|recaptcha'
        ], [
            'g-recaptcha-response.required' => 'التحقيق مطلوب',
            'g-recaptcha-response.recaptcha' => 'التحقق غير سليم',
        ]);

    }

//    if (env('LARAVEL_CAPATCHA')) {
    return validator($request_data, [
        'captcha' => 'required|captcha'
    ], [
        'captcha.required' => 'التحقيق مطلوب',
        'captcha.recaptcha' => 'التحقق غير سليم',
    ]);

//    }

}

function readCSV($csvFile, $delimiter)
{
    $file_handle = fopen($csvFile, 'r');
    while (!feof($file_handle)) {
        $line_of_text[] = fgetcsv($file_handle, 0, $delimiter);
    }
    fclose($file_handle);
    return $line_of_text;
}

function enToAr($string)
{
    return strtr($string, array('0' => '٠', '1' => '١', '2' => '٢', '3' => '٣', '4' => '٤', '5' => '٥', '6' => '٦', '7' => '٧', '8' => '٨', '9' => '٩', 'am' => 'ص', 'pm' => 'م'));
}

function getConfig($config_name)
{
    $settingJson = file_get_contents('.setting.json', asset(''));
    $array = json_decode($settingJson, true);
    return $array[$config_name] ?? null;
}

function getOfficeAgentPaymentType($type)
{
    return \App\Models\OfficeAgentPaymentType::whereType($type)->first();
}

function getOfficeFinalOpinion($type)
{
    return \App\Models\OfficeFinalOpinion::whereType($type)->first();
}

function checkSendAllowed($office_agent)
{

    return true;
    if (!$office_agent->endorse_at || ((getOfficeFinalOpinion('date_continue')->id ?? '') == $office_agent->order_status_id)) {
        return true;
//        return 'send';
    }
//    if (($office_agent->office_type_id == 1 && $office_agent->order_status_id == (getOfficeFinalOpinion('final_uploader')->id ?? ''))) {
//        return 'renew';
//    }

    return false;
}

function checkIsFront($data)
{
    if ($data['is_front'] ?? null) {
        $officeAgent = \App\Models\OfficeAgent::find($data['office_agent_id'] ?? null) ?? null;
        $officeAgentEndorse = \App\Models\OfficeAgent::find($data['office_agent_id'] ?? null)->endorse_at ?? null;
        if ($officeAgentEndorse && ((getOfficeFinalOpinion('date_continue')->id ?? null) != $officeAgent->order_status_id) && $officeAgent->office_order_type_id != 86) {
            return true;
        }
    }
    return false;
}

function generate_pattern($search_string)
{
    $patterns = array("/(ا|إ|أ|آ)/", "/(ه|ة)/", "/(ي|ى)/");
    $replacements = array("[ا|إ|أ|آ]", "[ه|ة]", "[ي|ى]");
    return preg_replace($patterns, $replacements, $search_string);
}

function getOfficeAgentAuth()
{
    return auth('agent')->user()->office_agent;
}

function getAuthUser($guard = "")
{
    return auth($guard)->user() ?? null;
}

function logout($guard = "")
{
    return auth($guard)->logout();
}

function getUserFile($type)
{
    $data = [
        "lab" => [
            27,
            41,
            39,
        ],
        "chim" => [
            40,
        ]
    ];
    return $data[$type] ?? [];
}

function getPaymentRelated($item)
{

    $payment_type = $item->paymentable_type;
    switch ($payment_type) {
        case Falcon::class:
            $title = $item->paymentable->P_O_A_NAME ?? '';
            break;
        default :
            $title = $item->name;
            break;
    }
    $item->related = $title;
    $item->makeHidden('paymentable');
    return $title;
}

function getStaticData()
{
    return [
        'lookup1' => [
            [
                'code' => 1,
                'label' => 'استخراج أول مرة'
            ],
            [
                'code' => 2,
                'label' => 'أستخراج بدل فاقد من الجواز'
            ],
            [
                'code' => 3,
                'label' => 'تجديد وثيقة منتهية'
            ],
            [
                'code' => 4,
                'label' => 'نقل ملكية'
            ],
            [
                'code' => 5,
                'label' => 'اتلاف جواز عند موت الصقر'
            ],
            [
                'code' => 6,
                'label' => 'الدفع'
            ],
        ],
        'lookup2' => [
            [
                'code' => 'M',
                'label' => 'ذكر'
            ],
            [
                'code' => 'F',
                'label' => 'انثي'
            ],
        ],
        'lookup3' => [
            [
                'code' => 1,
                'label' => 'تفريخ'
            ],
            [
                'code' => 2,
                'label' => 'بري'
            ],
            [
                'code' => 3,
                'label' => 'أخرى'
            ],
        ],
        'lookup4' => [
            [
                'code' => 1,
                'label' => 'الكويت'
            ],
            [
                'code' => 10,
                'label' => 'الفلبين'
            ],
            [
                'code' => 11,
                'label' => 'سيريلانكا'
            ],
            [
                'code' => 12,
                'label' => 'باكستان'
            ],
            [
                'code' => 13,
                'label' => 'الأردن'
            ],
            [
                'code' => 14,
                'label' => 'فلسطين'
            ],
            [
                'code' => 15,
                'label' => 'مصر'
            ],
            [
                'code' => 2,
                'label' => 'السعودية'
            ],
            [
                'code' => 3,
                'label' => 'البحرين'
            ],
            [
                'code' => 4,
                'label' => 'قطر'
            ],
            [
                'code' => 5,
                'label' => 'لبنان'
            ],
            [
                'code' => 6,
                'label' => 'سوريا'
            ],
            [
                'code' => 7,
                'label' => 'الولايات المتحدة الأمريكية'
            ],
            [
                'code' => 8,
                'label' => 'انجلترا'
            ],
            [
                'code' => 9,
                'label' => 'الهند'
            ],
        ],
        'lookup5' => [
            [
                'code' => 1,
                'label' => 'Appendix1'
            ],
            [
                'code' => 2,
                'label' => 'Appendix2'
            ],
            [
                'code' => 3,
                'label' => 'Appendix3'
            ],
        ],
        'lookup6' => [
            [
                'code' => 1,
                'label' => 'مستشفي الدهماء البيطري'
            ],
            [
                'code' => 2,
                'label' => 'مستشفي الكويت للصقور'
            ],
            [
                'code' => 3,
                'label' => 'مستشفى البيطري الدولي'
            ],
            [
                'code' => 3,
                'label' => 'مستشفي شركة بيت الإنماء الزراعية '
            ],
            [
                'code' => 3,
                'label' => 'مستشفى ميناء عبد الله البيطري'
            ],
        ],
        'lookup7' => [
            [
                'code' => 1,
                'label' => 'Word'
            ],
            [
                'code' => 2,
                'label' => 'Image'
            ],
            [
                'code' => 3,
                'label' => 'Excel'
            ],
            [
                'code' => 4,
                'label' => 'Pdf'
            ],
            [
                'code' => 5,
                'label' => 'PowerPoint'
            ],
            [
                'code' => 6,
                'label' => 'Video'
            ],
            [
                'code' => 7,
                'label' => 'HTML'
            ],
            [
                'code' => 8,
                'label' => 'All Files'
            ],
        ],
    ];
}
