<?php

namespace App\Http\Controllers;

use App\Models\CertificateFileDetail;
use App\Models\City;
use App\Models\File;
use App\Models\Governorate;
use App\Models\OfficeAgent;
use App\Models\OfficeAgentPayment;
use App\Models\OfficeDepartment;
use App\Models\OfficeDeviceAttachment;
use App\Models\OfficeDeviceType;
use App\Models\OfficeFinalOpinion;
use App\Models\OfficeOption;
use App\Models\Payment;
use App\Models\TenderCompanySubscription;
use App\Models\TenderCompany;
use App\Models\TenderCompanyFileDetail;


use App\Models\Violation as ViolationModel;
use App\Models\PunishmentSubjects;


use App\Models\ViolationCertificate;
use App\Modules\ViolationOfficer\Officer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modules\Violation\Violation\Violation;

class CsvRestoreV2Controller extends Controller
{
    private $storage_path;
    protected $violationPresenter;
    protected $officerPresenter;
    protected $violationModel;
    protected $subject_punishModel;
    protected $dictionary;


    public function __construct()
    {

        // $this->violationPresenter = new Violation();
        // $this->violationModel = new ViolationModel();
        // $this->subject_punishModel = new PunishmentSubjects();
        // $this->officerPresenter = new Officer();
        $this->storage_path = storage_path('/files/restore');
        $this->dictionary = [
            "1"=> null,
            "2"=> null,
            "3"=> "1",
            "4"=> "2",
            "5"=> "3",
            "6"=> "4",
            "7"=> "5",
            "8"=> null,
            "9"=> "15",
            "10"=> "4",
            "11"=> null,
            "12"=> "22",
            "13"=> "23",
            "14"=> "24",
            "15"=> "36",
            "16"=> "78",
            "17"=> "25",
            "18"=> "26",
            "19"=> "27",
            "20"=> "30",
            "21"=> "31",
            "22"=> null,
            "23"=> "37",
            "24"=> "87",
            "25"=> "33",
            "26"=> null,
            "27"=> "38",
            "28"=> "40",
            "29"=> "39",
            "30"=> "41",
            "31"=> "34",
            "32"=> "35",
            "33"=> "37",
            "34"=> null,
            "35"=> "74",
            "36"=> "75",
            "37"=> "29",
            "38"=> "14",
            "39"=> "15",
            "40"=> null,
            "41"=> null,
            "42"=> "76",
            "43"=> "71",
            "44"=> null,
            "45"=> null,
            "46"=> null,
            "47"=> null,
            "48"=> null,
            "49"=> null,
            "50"=> null,
            "51"=> null,
            "52"=> null,
            "53"=> null,
            "54"=> "12",
            "55"=> "13",
            "56"=> "71",
            "57"=> null,
            "58"=> "71",
            "59"=> null,
            "60"=> "9",
            "61"=> "65",
            "62"=> "3",
            "63"=> "4",
            "64"=> "10",
            "65"=> "11",
            "66"=> null,
            "67"=> null,
            "68"=> "28",
            "69"=> "13",
            "70"=> "15",
            "71"=> null,
            "72"=> "44",
            "73"=> "45",
            "74"=> "46",
            "75"=> null,
            "76"=> null,
            "77"=> null,
            "78"=> "male",
            "79"=> "male",
            "80"=> null,
            "81"=> null,
            "82"=> "kuwaiti",
            "83"=> "notKuwaiti",
            "84"=> null,
            "85"=> null,
            "86"=> "50",
            "87"=> "51",
            "88"=> null,
            "89"=> null,
            "90"=> "53",
            "91"=> "54",
            "92"=> null,
            "93"=> "59",
            "94"=> "60",
            "95"=> "61",
            "96"=> "62",
            "97"=> "63",
            "98"=> "88",
            "99"=> null,
            "100"=> "1",
            "101"=> "2",
            "102"=> "3",
            "103"=> "5",
            "104"=> "6",
            "105"=> "7",
            "106"=> "8",
            "107"=> "9",
            "108"=> "10",
            "109"=> "11",
            "110"=> "12",
            "111"=> "13",
            "112"=> "14",
            "113"=> "15",
            "114"=> "16",
            "115"=> "17",
            "116"=> "18",
            "117"=> "19",
            "118"=> null,
            "119"=> "4",
            "120"=> null,
            "121"=> null,
            "122"=> "67",
            "123"=> "68",
            "124"=> "6",
            "125"=> "9",
            "126"=> "8",
            "127"=> "12",
            "128"=> null,
            "129"=> "13",
            "130"=> "4",
            "131"=> "5",
            "132"=> "16",
            "133"=> "25",
            "134"=> "24",
            "135"=> "28",
            "136"=> null,
            "137"=> null,
            "138"=> "6",
            "139"=> "80",
            "140"=> null,
            "141"=> null,
            "142"=> "7",
            "143"=> "8",
            "144"=> null,
            "145"=> null,
            "146"=> "9",
            "147"=> "10",
            "148"=> "11",
            "149"=> null,
            "150"=> null,
            "151"=> "18",
            "152"=> "19",
            "153"=> "20",
            "154"=> "21",
            "155"=> null,
            "156"=> null,
            "157"=> "16",
            "158"=> "17",
            "159"=> null,
            "160"=> "22",
            "161"=> "23",
            "162"=> "24",
            "163"=> "25",
            "164"=> "26",
            "165"=> "27",
            "166"=> "28",
            "167"=> "26",
            "168"=> "29",
            "169"=> "30",
            "170"=> "31",
            "171"=> "32",
            "172"=> "33",
            "173"=> "34",
            "174"=> "35",
            "175"=> null,
            "176"=> null,
            "177"=> "25",
            "178"=> "26",
            "179"=> "27",
            "180"=> null,
            "181"=> null,
            "182"=> "9",
            "183"=> "10",
            "184"=> "11",
            "185"=> null,
            "186"=> null,
            "187"=> "43",
            "188"=> "49",
            "190"=> "47",
            "191"=> "48",
            "192"=> "49",
            "193"=> "43",
            "194"=> "49",
            "195"=> "49",
            "196"=> "49",
            "197"=> "28",
            "198"=> "14",
            "199"=> "10",
            "200"=> "20",
            "201"=> "19",
            "202"=> "11",
            "203"=> "21",
            "204"=> null,
            "205"=> "20",
            "206"=> "14",
            "207"=> "10",
            "208"=> "20",
            "209"=> "28",
            "210"=> "14",
            "211"=> "10",
            "212"=> "20",
            "213"=> "19",
            "214"=> "11",
            "215"=> "21",
            "216"=> "36",
            "217"=> "36",
            "218"=> "2",
            "219"=> "15",
            "220"=> "14",
            "221"=> "20",
            "222"=> "19",
            "223"=> "64",
            "224"=> "52",
            "225"=> "55",
            "226"=> "56",
            "227"=> "57",
            "228"=> "علم الاحصاء",
            "229"=> "العلوم الصحية",
            "230"=> "علوم البيئة",
            "231"=> "التحليل المخبري",
            "232"=> "اخري",
            "233"=> "69",
            "234"=> null,
            "235"=> "16",
            "236"=> "19",
            "237"=> null,
            "238"=> "17",
            "239"=> "16",
            "240"=> "19",
            "241"=> "17",
            "242"=> "15",
            "243"=> "18",
            "244"=> "15",
            "245"=> "18",
            "246"=> "18",
            "247"=> null,
            "248"=> null,
            "249"=> "علم الجيولوجيا",
            "250"=> "البيولوجيا(علم الحيوتم - علم التبات)\r\n",
            "251"=> "الكيمياء\r\n",
            "252"=> "الفيزياء",
            "253"=> "علوم البحار بما في ذلك العلوم الأوكيانوغرافية",
            "254"=> "اخري",
            "255"=> "28",
            "256"=> "29",
            "257"=> null,
            "258"=> null,
            "259"=> "79",
            "260"=> "36",
            "261"=> "23",
            "262"=> "22",
            "263"=> "35",
            "264"=> "49",
            "265"=> "23",
            "266"=> "26",
            "267"=> "27",
            "268"=> "36",
            "269"=> null,
            "270"=> "91",
            "271"=> "92",
            "272"=> "93",
            "273"=> "94",
            "274"=> "36",
            "275"=> "37",
            "276"=> "38",
            "277"=> "39",
            "278"=> "40",
            "279"=> "41",
            "280"=> "42",
            "281"=> "70",
            "282"=> null,
            "283"=> "65",
            "284"=> "66",
            "285"=> null
        ];

    }

    public function getCSVRestoreAll()
    {
        try {
            DB::beginTransaction();
            $this->restoreOffice("office-agent/off_details.csv");
            $this->restoreAttachment("office-agent/off_attachment.csv");
////            dd("test");
//
            $this->getHr();
            $this->restoreSpec('office-agent/off_specialty.csv');
            $this->restorePartner('office-agent/off_partners.csv','off_partners_attachment.csv');
            $this->restoreAgentPayment();

            $this->restoreTrack('office-agent/tracking.csv');

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();

        return "done";
    }
    public function getHr(){

        $offices = OfficeAgent::all();
        foreach ($offices as $office){
            $hrs = $this->runRestoreHR($office->order_serial)['hrs'] ?? [];
                foreach ($hrs as $hr){
                    $h = $office->human_resources()->firstOrCreate(['ssn' => $hr['ssn'] ?? null],$hr);
                    foreach ($hr['attachments'] ?? [] as $aa){
                        $aa['office_agent_id'] = $office->id;
                        $a = $h->attachments()->create($aa);
                        $f = $a->file()->create($aa);
                    }
                }
                $devs = $this->runRestoreDevices($office->order_serial);
                foreach ($devs['attachments'] as $a){
                    $at = OfficeDeviceAttachment::create([
                        "file_type_id" => $a['file_type_id'] ?? null,
                        "office_agent_id" => $office->id ?? null
                    ]);
                    $at->file()->create($a);
                }
                foreach ($devs['devices'] ?? [] as $dev){
                    $h = $office->devices()->create($dev);
                }
        }

    }


    public function restoreAgentPayment()
    {
        $csvFileName = 'payments.csv';
        $csvFile = $this->storage_path . '/office-agent/agent_payment/' . $csvFileName;

        $data = readCSV($csvFile, ',');

        $records = [];
        foreach ($data as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $records[] = $this->prepareAgentPaymentData($value);
        }

        foreach ($records as $record) {
            $office_agent = OfficeAgent::where('order_serial', $record['reference_no'])->first();
//            dd($record);
            if ($office_agent) {

                $office_payment = new OfficeAgentPayment();
                $office_payment = $office_payment->create([
                    'office_agent_id' => $office_agent->id,
                    'cost' => $record['cost'],
                    'payed_at' => $record['payed_at'],
                    'status' => 'available'
                ]);

                $payment = $office_payment->paymentable()->create([
                    'cost' => $record['cost'],
                    'name' => $office_agent->office_name_ar ?? null,
                    'email' => $office_agent->owner_email ?? null,
                    'phone' => $office_agent->owner_phone ?? null,
                    'status' => 1,
                ]);

                $payment->knet()->create([
                    'payment_id' => $record['payment_id'] ?? null,
                    'result' => $record['result'] ?? null,
                    'auth' => $record['auth'] ?? null,
                    'ref' => $record['refr'] ?? null,
                    'tran_id' => $record['trans_id'] ?? null,
                    'post_date' => $record['postdate'] ?? null,
                    'track_id' => $record['track_id'] ?? null,
                    'amount' => $record['cost'] ?? null,
                    'auth_code' => $record['auth'] ?? null,
                    'pay_id' => $record['id'] ?? null,
                ]);
            }
        }

        return return_msg(true, 'done');
    }

    public function prepareAgentPaymentData($value)
    {
        $fillable = ['id' => 0, 'payed_at' => 1, 'reference_no' => 2, 'cost' => 3, 'track_id' => 4,
            'payment_id' => 8, 'result' => 9, 'postdate' => 10, 'auth' => 11, 'trans_id' => 12, 'refr' => 13,
            'rawresponse' => 15, 'transval' => 14, 'error_msg' => 16, 'payment_page' => 17,
            'udf1' => 18, 'udf2' => 5, 'udf3' => 6, 'udf4' => 7, 'udf5' => 19,
        ];

        $preparedData = [];
        foreach ($fillable as $k => $fill) {
            $preparedData[$k] = ($value[$fill] ?? null) == 'NULL' ? null : ($value[$fill] ?? null);
        }

        return $preparedData;
    }

    public function runRestoreHR($Request_number = 'Lab0000032019')
    {
        $all_files = [
            [

                'csvFileName' => 'hum_res.csv',
                'csvFileName_attachment' => 'hum_attachment.csv',
            ],
            [

                'csvFileName' => 'lab_hum_res.csv',
                'csvFileName_attachment' => 'lab_hum_attachment.csv',
            ],
            [

                'csvFileName' => 'off_hum_res.csv',
                'csvFileName_attachment' => 'off_hum_attachment.csv',
            ],
        ];

        $hrs = [];
        $attachments = [];
        foreach ($all_files as $file) {
            $response = $this->restoreHR($Request_number, $file['csvFileName'], $file['csvFileName_attachment']);
            $hrs = array_merge($hrs, $response->toArray());

        }

        return [
            'hrs' => $hrs
        ];

    }

//    hr
    public function restoreHR($Request_number, $csvFileName, $csvFileName_attachment)
    {
//        $csvFileName = 'hum_res.csv';
//        $csvFileName_attachment = 'hum_attachment.csv';

//        $csvFileName = 'lab_hum_res.csv';
//        $csvFileName_attachment = 'lab_hum_attachment.csv';

//        $csvFileName = 'off_hum_res.csv';
//        $csvFileName_attachment = 'off_hum_attachment.csv';


        $csvFile = $this->storage_path . '/office-agent/hr/' . $csvFileName;
        $csvFileAttachment = $this->storage_path . '/office-agent/hr/' . $csvFileName_attachment;

        $data = readCSV($csvFile, ',');
        $data_attachment = readCSV($csvFileAttachment, ',');

        $records = [];
        foreach ($data as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $records[] = $this->prepareAgentHRData($value);
        }

        $records_attachment = [];
        foreach ($data_attachment as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $records_attachment[] = $this->prepareAgentHRAttachmentData($value);
        }

        $records_attachment = collect($records_attachment);

        $records = collect($records)->where('Request_number', $Request_number)->values();

        $records->transform(function ($item) use ($records_attachment) {

            if ($item['nationality'] ?? null) {
                $item['nationality'] = $this->officeAgentIdAlternative($item['nationality']);
            }
            if ($item['specialization_id'] ?? null) {
                $item['specialization_id'] = $this->officeAgentIdAlternative($item['specialization_id']);
            }
            if ($item['degree_id'] ?? null) {
                $item['degree_id'] = $this->officeAgentIdAlternative($item['degree_id']);
            }
            if ($item['job_id'] ?? null) {
                $item['job_id'] = $this->officeAgentIdAlternative($item['job_id']);
            }
            if ($item['gender'] ?? null) {
                $item['gender'] = $this->officeAgentIdAlternative($item['gender']);
            }

            $hr_attachment = $records_attachment->where('human_resource_id', $item['id'])->values();
            $hr_attachment->transform(function ($item) {

                if ($item['file_type_id'] ?? null) {
                    $item['file_type_id'] = $this->officeAgentIdAlternative($item['file_type_id']);
                }
                if ($item['name'] ?? null) {
                    $item['name'] = substr($item['name'], strrpos($item['name'], '/') + 1);
                }

                unset($item['human_resource_id']);
                return $item;
            });
            $item['attachments'] = $hr_attachment ?? [];

            unset($item['id']);
            unset($item['office_agent_id']);

            return $item;
        });

        return $records;
    }

    public function runRestoreDevices($Request_number = 'Lab0000032019')
    {
        $all_files = [
            [

                'csvFileName' => 'device.csv',
                'csvFileName_attachment' => 'dev_attachment.csv',
            ],
            [

                'csvFileName' => 'lab_device.csv',
                'csvFileName_attachment' => 'lab_dev_attachment.csv',
            ],
            [

                'csvFileName' => 'off_device.csv',
                'csvFileName_attachment' => 'off_dev_attachment.csv',
            ],
        ];

        $devices = [];
        $attachments = [];
        foreach ($all_files as $file) {
            $response = $this->restoreDevices($Request_number, $file['csvFileName'], $file['csvFileName_attachment']);
            $devices = array_merge($devices, $response['devices']->toArray());
            $attachments = array_merge($attachments, collect($response['attachments'])->toArray());

        }

        return [
            'devices' => $devices,
            'attachments' => $attachments,
        ];

    }

//    device
    public function restoreDevices($Request_number, $csvFileName, $csvFileName_attachment)
    {
        $csvFile = $this->storage_path . '/office-agent/devices/' . $csvFileName;
        $csvFileAttachment = $this->storage_path . '/office-agent/devices/' . $csvFileName_attachment;

        $data = readCSV($csvFile, ',');
        $data_attachment = readCSV($csvFileAttachment, ',');

        $records = [];
        foreach ($data as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $records[] = $this->prepareAgentDeviceData($value);
        }

        $records_attachment = [];
        foreach ($data_attachment as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $records_attachment[] = $this->prepareAgentDeviceAttachmentData($value);
        }

        $records_attachment = collect($records_attachment);

        $records = collect($records)->where('Request_number', $Request_number)->values();

        $records->transform(function ($item) use ($records_attachment) {

            $item['device_type_id'] = OfficeDeviceType::firstorCreate([
                "name" => $item['device_name'] ?? null
            ],[
                "name" => $item['device_name'] ?? null
            ])->id;

            $devices_attachment = $records_attachment->where('Reg_ID', $item['Reg_ID'])->values();
            $devices_attachment->transform(function ($item) {

                if ($item['file_type_id'] ?? null) {
                    $item['file_type_id'] = $this->officeAgentIdAlternative($item['file_type_id']);
                }
                if ($item['name'] ?? null) {
                    $item['name'] = substr($item['name'], strrpos($item['name'], '/') + 1);
                }
//
                unset($item['Reg_ID']);
                return $item;
            });
            $item['attachments'] = $devices_attachment ?? [];

            unset($item['Reg_ID']);
            return $item;
        });
        $attachments = $records->first()['attachments'] ?? [];
        return [
            'devices' => $records,
            'attachments' => $attachments,
        ];
    }

//    hr
    public function prepareAgentHRData($value)
    {
        $fillable = ['id' => 0, 'name' => 1, 'parent_name' => 2, 'family_name' => 3, 'email' => 5, 'phone' => 6, 'ssn' => 4,
            'gender' => 7, 'job_title' => 13, 'expert_years_number' => null,
            'work_duration' => null, 'work_date' => null, 'nationality' => 8,
            'specialization_id' => 10, 'degree_id' => 9, 'job_id' => 11, 'specialization_title' => 14,
            'residence_end_date' => null, 'office_agent_id' => 12, 'Request_number' => 16
        ];

        $preparedData = [];
        foreach ($fillable as $k => $fill) {
            $preparedData[$k] = ($value[$fill] ?? null) == 'NULL' ? null : ($value[$fill] ?? null);
        }

        return $preparedData;
    }

//    hr
    public function prepareAgentHRAttachmentData($value)
    {
        $fillable = ['name' => 1, 'human_resource_id' => 2, 'file_type_id' => 3];

        $preparedData = [];
        foreach ($fillable as $k => $fill) {
            $preparedData[$k] = ($value[$fill] ?? null) == 'NULL' ? null : ($value[$fill] ?? null);
        }

        return $preparedData;
    }

//    device
    public function prepareAgentDeviceData($value)
    {
        $fillable = ['device_name' => 2, 'office_agent_id' => null, 'number' => 3, 'serial' => 4, 'notes' => null, 'device_others' => null, 'lab_type_id' => null, 'Reg_ID' => 5, 'Request_number' => 7];

        $preparedData = [];
        foreach ($fillable as $k => $fill) {
            $preparedData[$k] = ($value[$fill] ?? null) == 'NULL' ? null : ($value[$fill] ?? null);
        }

        return $preparedData;
    }

//    device
    public function prepareAgentDeviceAttachmentData($value)
    {
        $fillable = ['name' => 1, 'Reg_ID' => 2, 'file_type_id' => 3];

        $preparedData = [];
        foreach ($fillable as $k => $fill) {
            $preparedData[$k] = ($value[$fill] ?? null) == 'NULL' ? null : ($value[$fill] ?? null);
        }

        return $preparedData;
    }

//    hr , devices
    public function officeAgentIdAlternative($alise_id)
    {
        $dictionary = [
            "1"=> null,
            "2"=> null,
            "3"=> "1",
            "4"=> "2",
            "5"=> "3",
            "6"=> "4",
            "7"=> "5",
            "8"=> null,
            "9"=> "15",
            "10"=> "4",
            "11"=> null,
            "12"=> "22",
            "13"=> "23",
            "14"=> "24",
            "15"=> "36",
            "16"=> "78",
            "17"=> "25",
            "18"=> "26",
            "19"=> "27",
            "20"=> "30",
            "21"=> "31",
            "22"=> null,
            "23"=> "37",
            "24"=> "87",
            "25"=> "33",
            "26"=> null,
            "27"=> "38",
            "28"=> "40",
            "29"=> "39",
            "30"=> "41",
            "31"=> "34",
            "32"=> "35",
            "33"=> "37",
            "34"=> null,
            "35"=> "74",
            "36"=> "75",
            "37"=> "29",
            "38"=> "14",
            "39"=> "15",
            "40"=> null,
            "41"=> null,
            "42"=> "76",
            "43"=> "71",
            "44"=> null,
            "45"=> null,
            "46"=> null,
            "47"=> null,
            "48"=> null,
            "49"=> null,
            "50"=> null,
            "51"=> null,
            "52"=> null,
            "53"=> null,
            "54"=> "12",
            "55"=> "13",
            "56"=> "71",
            "57"=> null,
            "58"=> "71",
            "59"=> null,
            "60"=> "9",
            "61"=> "65",
            "62"=> "3",
            "63"=> "4",
            "64"=> "10",
            "65"=> "11",
            "66"=> null,
            "67"=> null,
            "68"=> "28",
            "69"=> "13",
            "70"=> "15",
            "71"=> null,
            "72"=> "44",
            "73"=> "45",
            "74"=> "46",
            "75"=> null,
            "76"=> null,
            "77"=> null,
            "78"=> "male",
            "79"=> "male",
            "80"=> null,
            "81"=> null,
            "82"=> "kuwaiti",
            "83"=> "notKuwaiti",
            "84"=> null,
            "85"=> null,
            "86"=> "50",
            "87"=> "51",
            "88"=> null,
            "89"=> null,
            "90"=> "53",
            "91"=> "54",
            "92"=> null,
            "93"=> "59",
            "94"=> "60",
            "95"=> "61",
            "96"=> "62",
            "97"=> "63",
            "98"=> "88",
            "99"=> null,
            "100"=> "1",
            "101"=> "2",
            "102"=> "3",
            "103"=> "5",
            "104"=> "6",
            "105"=> "7",
            "106"=> "8",
            "107"=> "9",
            "108"=> "10",
            "109"=> "11",
            "110"=> "12",
            "111"=> "13",
            "112"=> "14",
            "113"=> "15",
            "114"=> "16",
            "115"=> "17",
            "116"=> "18",
            "117"=> "19",
            "118"=> null,
            "119"=> "4",
            "120"=> null,
            "121"=> null,
            "122"=> "67",
            "123"=> "68",
            "124"=> "6",
            "125"=> "9",
            "126"=> "8",
            "127"=> "12",
            "128"=> null,
            "129"=> "13",
            "130"=> "4",
            "131"=> "5",
            "132"=> "16",
            "133"=> "25",
            "134"=> "24",
            "135"=> "28",
            "136"=> null,
            "137"=> null,
            "138"=> "6",
            "139"=> "80",
            "140"=> null,
            "141"=> null,
            "142"=> "7",
            "143"=> "8",
            "144"=> null,
            "145"=> null,
            "146"=> "9",
            "147"=> "10",
            "148"=> "11",
            "149"=> null,
            "150"=> null,
            "151"=> "18",
            "152"=> "19",
            "153"=> "20",
            "154"=> "21",
            "155"=> null,
            "156"=> null,
            "157"=> "16",
            "158"=> "17",
            "159"=> null,
            "160"=> "22",
            "161"=> "23",
            "162"=> "24",
            "163"=> "25",
            "164"=> "26",
            "165"=> "27",
            "166"=> "28",
            "167"=> "26",
            "168"=> "29",
            "169"=> "30",
            "170"=> "31",
            "171"=> "32",
            "172"=> "33",
            "173"=> "34",
            "174"=> "35",
            "175"=> null,
            "176"=> null,
            "177"=> "25",
            "178"=> "26",
            "179"=> "27",
            "180"=> null,
            "181"=> null,
            "182"=> "9",
            "183"=> "10",
            "184"=> "11",
            "185"=> null,
            "186"=> null,
            "187"=> "43",
            "188"=> "49",
            "190"=> "47",
            "191"=> "48",
            "192"=> "49",
            "193"=> "43",
            "194"=> "49",
            "195"=> "49",
            "196"=> "49",
            "197"=> "28",
            "198"=> "14",
            "199"=> "10",
            "200"=> "20",
            "201"=> "19",
            "202"=> "11",
            "203"=> "21",
            "204"=> null,
            "205"=> "20",
            "206"=> "14",
            "207"=> "10",
            "208"=> "20",
            "209"=> "28",
            "210"=> "14",
            "211"=> "10",
            "212"=> "20",
            "213"=> "19",
            "214"=> "11",
            "215"=> "21",
            "216"=> "36",
            "217"=> "36",
            "218"=> "2",
            "219"=> "15",
            "220"=> "14",
            "221"=> "20",
            "222"=> "19",
            "223"=> "64",
            "224"=> "52",
            "225"=> "55",
            "226"=> "56",
            "227"=> "57",
            "228"=> "علم الاحصاء",
            "229"=> "العلوم الصحية",
            "230"=> "علوم البيئة",
            "231"=> "التحليل المخبري",
            "232"=> "اخري",
            "233"=> "69",
            "234"=> null,
            "235"=> "16",
            "236"=> "19",
            "237"=> null,
            "238"=> "17",
            "239"=> "16",
            "240"=> "19",
            "241"=> "17",
            "242"=> "15",
            "243"=> "18",
            "244"=> "15",
            "245"=> "18",
            "246"=> "18",
            "247"=> null,
            "248"=> null,
            "249"=> "علم الجيولوجيا",
            "250"=> "البيولوجيا(علم الحيوتم - علم التبات)\r\n",
            "251"=> "الكيمياء\r\n",
            "252"=> "الفيزياء",
            "253"=> "علوم البحار بما في ذلك العلوم الأوكيانوغرافية",
            "254"=> "اخري",
            "255"=> "28",
            "256"=> "29",
            "257"=> null,
            "258"=> null,
            "259"=> "79",
            "260"=> "36",
            "261"=> "23",
            "262"=> "22",
            "263"=> "35",
            "264"=> "49",
            "265"=> "23",
            "266"=> "26",
            "267"=> "27",
            "268"=> "36",
            "269"=> null,
            "270"=> "91",
            "271"=> "92",
            "272"=> "93",
            "273"=> "94",
            "274"=> "36",
            "275"=> "37",
            "276"=> "38",
            "277"=> "39",
            "278"=> "40",
            "279"=> "41",
            "280"=> "42",
            "281"=> "70",
            "282"=> null,
            "283"=> "65",
            "284"=> "66",
            "285"=> null
        ];
        return $dictionary[$alise_id] ?? null;
    }



    public function restoreTrack($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = collect(readCSV($csvFile, ','));
//            dd($data);
            $all_process = collect([]);
            foreach ($data as $key => $datum) {
                if (!$datum) continue;
                $office = OfficeAgent::where('order_serial',$this->removeNull($datum[6]))->first();
                if (!$office)continue;
                $all_process->put($key,collect($this->prepareTrack($datum,$office)));
            }
            $all_process = $all_process->groupBy('office_agent_id');
            $all_process = $all_process->transform(function ($item,$key){
                $item = $item->transform(function ($i,$k) use ($item){
//                    dd($k);
                    $i['to_user_id'] = $item[$k+1]['from_user_id'] ?? null;
                    $i['is_active'] = ($item[$k+1]['from_user_id'] ?? null) ? 0 : 1;
                    return $i;
                });
                return $item;
            });
            foreach ($all_process as $office_agent_id => $process){
                $office = OfficeAgent::find($office_agent_id);
//                dd($process);
                $office->processes()->createMany($process->toArray());
            }
//            dd($all_process);

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }

        DB::commit();
        return "done";
    }

    public function prepareTrack($datum,$office)
    {
        return [
          "office_agent_id" => $office->id ?? null,
          "department_id" => OfficeDepartment::find($this->officeAgentIdAlternative($this->removeNull($datum[5])))->id ?? null,
          "from_user_id" => $this->removeNull($datum[7]),
//          "to_user_id" => '',
          "status_id" => OfficeFinalOpinion::find($this->officeAgentIdAlternative($this->removeNull($datum[5])))->id ?? null,
          "status_text" => '',
          "comment" => $this->removeNull($datum[2]),
//          "is_active" => '',
          "created_at" => $this->removeNull($datum[4]),
        ];
    }

    public function restoreOfficeV1($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = collect(readCSV($csvFile, ','));

            foreach ($data as $datum) {
                if (!$datum) continue;
                $item = $this->prepareOfficeDataV1($datum);


                $office = OfficeAgent::firstOrCreate([
                    "order_serial" => $item["order_serial"] ?? null
                ] , $item);

                if ($office->agent_user)continue;

                // User
                $user = $office->agent_user()->create([
                    "user_name" => $this->removeNull($datum[8]),
                    "email" => $this->removeNull($datum[7]),
                    "password" => bcrypt($datum[8]),
                    "plain_password" => $this->removeNull($datum[8]),
                ]);

                $office->agent_user_id = $user->id;
                $office->save();

                $this->prepareAddress($office, $datum);

//                $hrs = $this->runRestoreHR($office->order_serial)['hrs'] ?? [];
//                foreach ($hrs as $hr){
//                    $h = $office->human_resources()->create($hr);
//                    foreach ($hr['attachments'] ?? [] as $aa){
//                        $a = $h->attachments()->create($aa);
//                        $f = $a->file()->create($aa);
//                    }
//                }
//
//                $devs = $this->runRestoreDevices($office->order_serial);
//                foreach ($devs['attachments'] as $a){
//                    $at = OfficeDeviceAttachment::create([
//                        "file_type_id" => $a['file_type_id'] ?? null,
//                        "office_agent_id" => $office->id ?? null
//                    ]);
//                    $at->file()->create($a);
//                }
//                foreach ($devs as $dev){
//                    $h = $office->devices()->create($dev);
//                }
            }

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }

        DB::commit();
        return "done";
    }


    public function restoreOffice($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = collect(readCSV($csvFile, ','));
//            $header = $data->shift();
//            dd($header);
            foreach ($data as $datum) {
//                dd($datum);
                if (!$datum) continue;
                $item = $this->prepareOfficeData($datum);
//                dd($item);
                // Office
                $office = OfficeAgent::updateOrCreate([
                    "order_serial" => $item['order_serial']
                ],$item);
                // User
                if ($office->agent_user){
                    $user = $office->agent_user()->update([
                        "user_name" => $this->removeNull($datum[41]),
                        "email" => $this->removeNull($datum[40]),
                        "password" => bcrypt($datum[42]),
                        "plain_password" => $this->removeNull($datum[42]),
                    ]);
                }else{
                    $user = $office->agent_user()->create([
                        "user_name" => $this->removeNull($datum[41]),
                        "email" => $this->removeNull($datum[40]),
                        "password" => bcrypt($datum[42]),
                        "plain_password" => $this->removeNull($datum[42]),
                    ]);
                }
                $office->agent_user_id = $office->agent_user->id ?? null;
                $office->save();
                $this->prepareAddress($office, $datum);

//                $hrs = $this->runRestoreHR($office->order_serial)['hrs'] ?? [] ;
//                foreach ($hrs as $hr){
//                    $h = $office->human_resources()->create($hr);
//                    foreach ($hr['attachments'] ?? [] as $aa){
//                        $a = $h->attachments()->create($aa);
//                        $f = $a->file()->create($aa);
//                    }
//                }
//
//                $devs = $this->runRestoreDevices($office->order_serial);
//                foreach ($devs['attachments'] as $a){
//                    $at = OfficeDeviceAttachment::create([
//                        "file_type_id" => $a['file_type_id'] ?? null,
//                        "office_agent_id" => $office->id ?? null
//                    ]);
//                    $at->file()->create($a);
//                }
//                foreach ($devs as $dev){
//                    $h = $office->devices()->create($dev);
//                }
            }

        } catch (\Exception $exception) {
//            dd($datum);
            dd($exception->getMessage());
            DB::rollBack();
        }

        DB::commit();
        return "done";

    }

    public function prepareAddress($office, $item)
    {
        $gover = null;
        $city = null;
        if (($item[127] ?? null) != null && ($item[127] ?? null) != "NULL") {
            $gover = Governorate::firstOrCreate([
                "title_ar" => $item[127],
                "title_en" => $item[127],
            ]);
        }
        if (($item[132] ?? null) != null && ($item[132] ?? null) != "NULL") {
            $city = City::firstOrCreate([
                "title_ar" => $item[132],
                "title_en" => $item[132],
                "governorate_id" => $gover->id ?? null,
            ]);

        }

        $office->addresses()->create([
            'segment' => $this->removeNull($item[17]),
            'area' => $this->removeNull($item[18]),
            'street' => $this->removeNull($item[19]),
            'full_address' => null,
            'building' => $this->removeNull($item[20]),
            'floor' => $this->removeNull($item[21]),
            'city_id' => $city->id ?? null,
            'address_type' => 'main',
            'governorate_id' => $gover->id ?? null,
            'branch_type_id' => null,
        ]);
    }

    public function prepareOfficeData($item)
    {

        $dictionary = $this->dictionary;

        $endorsed = [
            "OFF0000012019",
            "OFF0000042019",
            "OFF0000052019",
            "OFF0000092019",
            "OFF0000182019",
            "OFF0000052019",
            "OFF0000322019",
            "OFF0000332019",
            "ENV0000012019",
            "ENV0001512019",
            "SMK0000012019",
            "Lab0000032019",
            "ENV0001532019",
            "ENV0001562019",
            "ENV0001562019",
            "ENV0001602019",
            "SMK0000062019",
            "Lab0000112019",
            "SMK0000092019",
            "SMK0000112019",
            "SMK0000132019",
            "SMK0000152019",
        ];

        return [
            'office_name_ar' => $this->removeNull($item[1]),
            'office_name_en' => $this->removeNull($item[2]),
            'office_type_id' => strstr($this->removeNull($item[34]),"OFF") ? 1 : 2,
            'owner_name' => $this->removeNull($item[3]),
            'owner_parent_name' => $this->removeNull($item[4]),
            'owner_family_name' => $this->removeNull($item[5]),
            'owner_email' => $this->removeNull($item[9]),
            'owner_gender' => null,
            'owner_phone' => $this->removeNull($item[7]),
            'owner_nationality_id' => null,
            'owner_specialization_id' => null,
            'owner_degree_id' => null,
            'owner_ssn' => $this->removeNull($item[6]),
            'office_phone' => $this->removeNull($item[7]),
            'office_mobile' => $this->removeNull($item[8]),
            'license_number' => $this->removeNull($item[13]),
            'order_serial' => $this->removeNull($item[34]),
            'contact_officer_name' => $this->removeNull($item[11]),
            'contact_officer_phone' => $this->removeNull($item[12]),
            'license_end_date' => $this->removeNull($item[14]) ? Carbon::parse($item[14])->format('Y:m:d H:m:s'): null,

            'private_serial' => rand(20, 99) . Carbon::now()->timestamp,

            'registration_date' => null,
            'contract_end_date' => null,

            'endorse_at' => in_array($item[34], $endorsed) ? $item[35] : null,
//            'created_at'  => Carbon::parse($this->removeNull($item[35]))->format('Y:m:d H:m:s'),
            'created_at' => $this->removeNull($item[35]),


            'office_section_activity_id' => $dictionary[$item[28]] ?? null,
            'office_section_type_id' => $dictionary[$item[28]] ?? null,
            'company_type_id' => $dictionary[$item[29]] ?? null,
            'another_branch_type_id' => $dictionary[$item[22]] ?? null,
            'contract_type_id' => $dictionary[$item[23]] ?? null,
            'classification_degree_id' => $dictionary[$item[24]] ?? null,
            'office_order_type_id' => $dictionary[$item[52]] ?? null,

            // ناقص
            'order_status_id' => $dictionary[$item[52]] ?? null,


        ];
    }

    public function prepareOfficeDataV1($item)
    {

        $dictionary = $this->dictionary;

        $endorsed = [
            "OFF0000012019",
            "OFF0000042019",
            "OFF0000052019",
            "OFF0000092019",
            "OFF0000182019",
            "OFF0000052019",
            "OFF0000322019",
            "OFF0000332019",
            "ENV0000012019",
            "ENV0001512019",
            "SMK0000012019",
            "Lab0000032019",
            "ENV0001532019",
            "ENV0001562019",
            "ENV0001562019",
            "ENV0001602019",
            "SMK0000062019",
            "Lab0000112019",
            "SMK0000092019",
            "SMK0000112019",
            "SMK0000132019",
            "SMK0000152019",
        ];

        return [
            'office_name_ar' => $this->removeNull($item[3]),
//            'office_name_en' => $this->removeNull($item[2]),
            'office_type_id' => 1,
            'owner_name' => $this->removeNull($item[4]),

            'owner_parent_name' => $this->removeNull($item[14]),
            'owner_family_name' => $this->removeNull($item[15]),

            'owner_email' => $this->removeNull($item[7]),
//            'owner_gender' => null,
            'owner_phone' => $this->removeNull($item[6]),
//            'owner_nationality_id' => null,
//            'owner_specialization_id' => null,
//            'owner_degree_id' => null,
            'owner_ssn' => $this->removeNull($item[5]),
            'office_phone' => $this->removeNull($item[7]),
//            'office_mobile' => $this->removeNull($item[6]),
//            'license_number' => $this->removeNull($item[13]),

            'order_serial' => $this->removeNull($item[1]),

//            'contact_officer_name' => $this->removeNull($item[11]),
//            'contact_officer_phone' => $this->removeNull($item[12]),

            'license_end_date' => $this->removeNull($item[16]) ? Carbon::parse($item[16])->format('Y:m:d H:m:s'): null,

            'private_serial' => rand(20, 99) . Carbon::now()->timestamp,

//            'registration_date' => null,
//            'contract_end_date' => null,

//            'endorse_at' => in_array($item[34], $endorsed) ? $item[35] : null,
//            'created_at'  => Carbon::parse($this->removeNull($item[35]))->format('Y:m:d H:m:s'),
            'created_at' => $this->removeNull($item[2]),


//            'office_section_activity_id' => $dictionary[$item[28]] ?? null,
//            'office_section_type_id' => $dictionary[$item[28]] ?? null,
//            'company_type_id' => $dictionary[$item[29]] ?? null,
//            'another_branch_type_id' => $dictionary[$item[22]] ?? null,
//            'contract_type_id' => $dictionary[$item[23]] ?? null,
//            'classification_degree_id' => $dictionary[$item[24]] ?? null,
//            'office_order_type_id' => $dictionary[$item[52]] ?? null,

            // ناقص
            'order_status_id' => $dictionary[$item[12]] ?? null,


        ];
    }

    public function removeNull($item)
    {
        return $item == "NULL" ? null : $item;
    }

    public function restoreAttachment($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = collect(readCSV($csvFile, ','));
            foreach ($data as $datum) {
                if (!$datum) continue;
                $item = $this->prepareAttachment($datum);
                $office = OfficeAgent::where('order_serial', $item['serial'] ?? null)->first();
                if ($office) {
                    $att = $office->attachments()->create($item);
                    $att->file()->create([
                        "name" => $item['name'] ?? null
                    ]);
                }
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
//        return OfficeAgent::all();

        return "done";

    }

    public function prepareAttachment($item)
    {
        $name = explode('/', $this->removeNull($item[1] ?? null));
        return [
            "file_type_id" => $this->officeAgentIdAlternative($item[3]),
            "serial" => $this->removeNull($item[38] ?? null),
            "name" => $name[count($name) - 1] ?? null,
        ];
    }

    public function restoreAddress($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = collect(readCSV($csvFile, ','));
            foreach ($data as $datum) {
                if (!$datum) continue;
//                dd($datum);
                $office = OfficeAgent::where('order_serial', $datum[44] ?? null)->first();
                if ($office) {
                    $this->prepareAddressV2($office, $datum);
                }
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
//        return OfficeAgent::all();

        return "done";

        return compact('files', 'payments');
    }

    public function prepareAddressV2($office, $item)
    {
        $gover = null;
        $city = null;
        if ($item[1] != null && $item[1] != "NULL") {
            $gover = Governorate::firstOrCreate([
                "title_ar" => $item[1],
                "title_en" => $item[1],
            ]);
        }
        if ($item[2] != null && $item[2] != "NULL") {
            $city = City::firstOrCreate([
                "title_ar" => $item[2],
                "title_en" => $item[2],
                "governorate_id" => $gover->id ?? null,
            ]);
        }


        $office->addresses()->create([
            'segment' => $this->removeNull($item[3]),
            'area' => $this->removeNull($item[4]),
            'street' => null,
            'full_address' => $this->removeNull($item[5]),
            'building' => $this->removeNull($item[6]),
            'floor' => $this->removeNull($item[7]),
            'city_id' => $city->id ?? null,
            'address_type' => null,
            'governorate_id' => $gover->id ?? null,
            'branch_type_id' => $this->removeNull($item[5]) ? 13 : 12,
        ]);
    }

    public function restoreSpec($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = collect(readCSV($csvFile, ','));
            foreach ($data as $datum) {
                if (!$datum) continue;
//                dd($datum);
                $office = OfficeAgent::where('order_serial', $datum[37] ?? null)->first();
                if ($office) {
                    $office->specializations()->attach($this->officeAgentIdAlternative($datum[1]));
                }
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
//        return OfficeAgent::all();

        return "done";

    }

    public function restorePartner($csvFileName, $attachment)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $csvFile2 = $this->storage_path . '/' . $attachment;
            $data = collect(readCSV($csvFile, ','));
            $att = collect(readCSV($csvFile2, ','));
//            dd($att);
            foreach ($data as $datum) {
                if (!$datum) continue;
//                dd($datum);
                $office = OfficeAgent::where('order_serial', $datum[39] ?? null)->first();
                if ($office) {
                    $d = $this->preparePartner($datum);
                    $part = $office->office_partners()->create($d);
                    foreach ($att as $at) {
                        if ($at[2] == ($datum[0] ?? null)) {
                            $a = $part->attachments()->create([
                                "file_type_id" => $this->dictionary[$this->removeNull($at[3])] ?? null,
                                "office_agent_id" => $office->id,
                            ]);
                            $name = explode('/', $this->removeNull($at[1] ?? null));
                            if ($a) {
                                $a->file()->create([
                                    "name" => $name[count($name) - 1] ?? null,
                                ]);
                            }
                        }
                    }
                }

            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
//        return OfficeAgent::all();

        return "done";

    }

    public function preparePartner($item)
    {
        return [
            "name" => $this->removeNull($item[1]),
            "ssn" => $this->removeNull($item[4]),
            "notes" => $this->removeNull($item[3]),
        ];
    }


}
