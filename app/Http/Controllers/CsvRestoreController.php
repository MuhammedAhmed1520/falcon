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

class CsvRestoreController extends Controller
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

    public function restoreAgentPayment()
    {
        $csvFileName = 'payments.csv';
        $csvFile = $this->storage_path . '/agent_payment/' . $csvFileName;

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


        $csvFile = $this->storage_path . '/hr/' . $csvFileName;
        $csvFileAttachment = $this->storage_path . '/hr/' . $csvFileName_attachment;

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
        $csvFile = $this->storage_path . '/devices/' . $csvFileName;
        $csvFileAttachment = $this->storage_path . '/devices/' . $csvFileName_attachment;

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

    public function subject_violation($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = readCSV($csvFile, ',');
            // dd(collect($data)->take(5));

            foreach ($data as $key => $item) {
                if ($item) {
                    // if ($key == 1000) {
                    //     break;
                    // }

                    // if ($key < 1000) {
                    //     continue;
                    // }

                    $violation = $this->violationModel->whereSerial($item[3])->first();
                    if (!$violation) {
                        continue;
                    }
                    $number = str_replace('مادة ', '', $item[36]);
                    $number = str_replace(' ', '', $number);
                    $number = str_replace('مكرر', '', $number);


                    $subjectNumber = $this->subject_punishModel->where('subject_number', 'like', '%' . $number . '%')->first();
                    if ($subjectNumber) {
                        $violation->getSubjectParagraph()->attach($subjectNumber['id'],
                            [
                                'fine_cost' => $violation['fine_cost'],
                            ]);
                    } else {
                        // Store In File
                        // if($number != 173 && $number != 73){
                        //     dd($number);
                        // }
                        // dd($number);
                        $this->csvstr($item);
                    }
                }
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
        return "done";


    }

    function csvstr(array $fields)
    {
        $filepathe = $this->storage_path . '/' . 'notfoundsubject.csv';
        $fp = fopen($filepathe, 'a');
        fputcsv($fp, $fields);
        fclose($fp);
    }

    public function getCSVRestoreAll()
    {



//        $officers = $this->officersRestore("eservices_violations_officers.csv");
//        $pages = $this->pagesRestore("eservices_engineering.csv");
//        $pages = $this->pagesRestore("pages.csv");
//        $violations = $this->violationRestore("eservices_violations.csv");
//        $tenders = $this->tendersRestore("eservices_tenders_buy.csv");
//        $comp_fees = $this->compFeesRestore("eservices_tenders_register_fees.csv");
        // $cert = $this->certificateRestore("epaviolationscerts.csv");
        // $files = $this->filesRestore("files.csv");
        // $payments = $this->paymentRestore("epaonlinepayments.csv");
        //   $subject = $this->subject_violation("eservices_violations_2.csv");
        //   $data = $this->companiesDates("eservices_tenders_register.csv");

        //  return $this->tenderCompaniesFiles('eservices_tenders_register_file.csv');
        // $f1 = $this->companiesFilesNames('f1.csv');
        // $f2 = $this->companiesFilesNames('f2.csv');
        // $f3 = $this->companiesFilesNames('f3.csv');
        // $f4 = $this->companiesFilesNames('f4.csv');
        // $f5 = $this->companiesFilesNames('f5.csv');
        // $f6 = $this->companiesFilesNames('f6.csv');
        // $f7 = $this->companiesFilesNames('f7.csv');



//        $agents = $this->restoreOffice("off_details.csv");
//        $agents = $this->restoreOfficeV1("registration.csv");


        return $this->restoreAttachment("off_attachment.csv");

//        $agents = $this->restoreAddress("off_address.csv");
//        $agents = $this->restoreSpec("off_specialty.csv");

//        $agents = $this->restorePartner("off_partners.csv","off_partners_attachment.csv");

//        $track = $this->restoreAgentPayment();

//            $offices = OfficeAgent::all();
//            foreach ($offices as $office){
//                $devs = $this->runRestoreDevices($office->order_serial);
//
//                foreach ($devs['attachments'] as $a){
//                    $at = OfficeDeviceAttachment::create([
//                        "file_type_id" => $a['file_type_id'] ?? null,
//                        "office_agent_id" => $office->id ?? null
//                    ]);
//                    $at->file()->create($a);
//                }
//                foreach ($devs['devices'] as $dev){
//                    $h = $office->devices()->create($dev);
//                }
//            }

//        $track = $this->restoreTrack('track.csv');

//        return $this->runRestoreHR('OFF0000322019');

        return compact('track');
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

//                $this->prepareAddress($office, $datum);

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
            $header = $data->shift();
//            dd($header);
            foreach ($data as $datum) {
                if (!$datum) continue;
                $item = $this->prepareOfficeData($datum);
//                dd($item);
                // Office
                $office = OfficeAgent::create($item);
                // User
                $user = $office->agent_user()->create([
                    "user_name" => $this->removeNull($datum[41]),
                    "email" => $this->removeNull($datum[40]),
                    "password" => bcrypt($datum[42]),
                    "plain_password" => $this->removeNull($datum[42]),
                ]);

                $office->agent_user_id = $user->id;
                $office->save();
                $this->prepareAddress($office, $datum);

                $hrs = $this->runRestoreHR($office->order_serial)['hrs'] ?? [] ;
                foreach ($hrs as $hr){
                    $h = $office->human_resources()->create($hr);
                    foreach ($hr['attachments'] ?? [] as $aa){
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
                foreach ($devs as $dev){
                    $h = $office->devices()->create($dev);
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
            'office_type_id' => 1,
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
        $files = [];
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = collect(readCSV($csvFile, ','));
            foreach ($data as $datum) {
                if (!$datum) continue;
                $item = $this->prepareAttachment($datum);
                $files[] = $item;

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

        return $files;

    }

    public function prepareAttachment($item)
    {
//        dd($item);

        $name = explode('/', $this->removeNull($item[1] ?? null));

        if (!($item[38] ?? null)){
            return [
                "file_type_id" => $this->officeAgentIdAlternative($item[3]),
                "serial" => $this->removeNull($item[18] ?? null),
                "name" => $name[count($name) - 1] ?? null,
            ];
//            dd($item);
        }

        return [
            "file_type_id" => $this->officeAgentIdAlternative($item[3]),
//            "serial" => $this->removeNull($item[38] ?? null),
            "serial" =>null,
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


    public function certificateRestore($csvFileName)
    {

        try {
            $object = new ViolationCertificate();
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = readCSV($csvFile, ',');
            // dd(collect($data)->take(20));


            foreach ($data as $key => $item) {
                if ($item) {
                    $certData = $this->prepareCertificateData($item);
                    $findCertificate = ViolationCertificate::find($certData['id']);
                    if ($findCertificate) {
                        continue;
                    }
                    $object->create($certData);
                }
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
        return "done";

    }

    public function tenderCompaniesFiles($csvFileName)
    {


        $csvFile = $this->storage_path . '/' . $csvFileName;
        $data = readCSV($csvFile, ',');

        $fill_arr = [];
        foreach ($data as $item) {
            if ($item[0] ?? null) {
                if ($item[7] && $item[7] != 'NULL' && $item[7] != '-' && $item[7] != '') {
                    $fill_arr[] = [
                        'company_id' => $item[0],
                        'name' => 'd1',
                        'file_name' => $item[7],
                        'comment' => $item[15]
                    ];
                }
                if ($item[8] && $item[8] != 'NULL' && $item[8] != '-' && $item[8] != '') {
                    $fill_arr[] = [
                        'company_id' => $item[0],
                        'name' => 'd2',
                        'file_name' => $item[8],
                        'comment' => $item[16]
                    ];
                }
                if ($item[9] && $item[9] != 'NULL' && $item[9] != '-' && $item[9] != '') {
                    $fill_arr[] = [
                        'company_id' => $item[0],
                        'name' => 'd3',
                        'file_name' => $item[9],
                        'comment' => $item[17]
                    ];
                }
                if ($item[10] && $item[10] != 'NULL' && $item[10] != '-' && $item[10] != '') {
                    $fill_arr[] = [
                        'company_id' => $item[0],
                        'name' => 'd4',
                        'file_name' => $item[10],
                        'comment' => $item[18]
                    ];
                }
                if ($item[11] && $item[11] != 'NULL' && $item[11] != '-' && $item[11] != '') {
                    $fill_arr[] = [
                        'company_id' => $item[0],
                        'name' => 'd5',
                        'file_name' => $item[11],
                        'comment' => $item[19]
                    ];
                }
                if ($item[12] && $item[12] != 'NULL' && $item[12] != '-' && $item[12] != '') {
                    $fill_arr[] = [
                        'company_id' => $item[0],
                        'name' => 'd6',
                        'file_name' => $item[12],
                        'comment' => $item[20]
                    ];
                }
                if ($item[13] && $item[13] != 'NULL' && $item[13] != '-' && $item[13] != '') {
                    $fill_arr[] = [
                        'company_id' => $item[0],
                        'name' => 'd7',
                        'file_name' => $item[13],
                        'comment' => $item[21]
                    ];
                }
            }
        }
        return $data;
        try {
            DB::beginTransaction();
            foreach ($fill_arr as $element) {
                // dd($element);

                $tender_file_detail = new TenderCompanyFileDetail();
                $record = $tender_file_detail->create($element);
                $record->file()->create([
                    'name' => $element['file_name']
                ]);
            }

        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
        return "done";
    }

    public function companiesFilesNames($csvFileName)
    {

        $csvFile = $this->storage_path . '/' . $csvFileName;
        $data = readCSV($csvFile, ',');
        $fill_arr = [];
        foreach ($data as $item) {
            if ($item[0] ?? null) {
                $fill_arr[] = intval($item[0]);
            }
        }
        return $fill_arr;
    }

    public function companiesDates($csvFileName)
    {

        $csvFile = $this->storage_path . '/' . $csvFileName;
        $data = readCSV($csvFile, ',');
        foreach ($data as $item) {
            $tender_c = TenderCompany::where('reference_code', $item[0])->first();
            if ($tender_c) {
                $tender_c->created_at = $item[1];
                $tender_c->save();
            }
        }
        return $data;
    }

    public function paymentRestore($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = collect(readCSV($csvFile, ','));
            // dd($data->take(20));
            $certs = ViolationCertificate::all();
            foreach ($certs as $cert) {
                foreach ($data as $item) {
                    if ($cert['id'] == $item[10]) {

                        $pData['name'] = $cert['owner_name'];
                        $pData['email'] = $cert['email'];
                        $pData['phone'] = $cert['phone'];
                        $pData['cost'] = $item[2];
                        $pData['paymentable_type'] = ViolationCertificate::class;
                        $pData['paymentable_id'] = $item[10];
                        $pData['status'] = $item[5] == 'CAPTURED' ? 1 : 0;

                        $payment = Payment::updateOrCreate(['paymentable_type' => ViolationCertificate::class, 'paymentable_id' => $item[10]], $pData);

                        $kData['payment_id'] = $item[4];
                        $kData['result'] = $item[5];
                        $kData['auth'] = $item[6];
//                        $kData['avr'] = $item[];
                        $kData['ref'] = $item[7];
                        $kData['tran_id'] = $item[9];
                        $kData['post_date'] = $item[8];
//                        $kData['track_id'] = $item[];
                        $kData['amount'] = $item[2];
//                        $kData['auth_code'] = $item[6];

                        $payment->knet()->create($kData);
                    }
                }

            }


        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
        return "done";

    }

    public function filesRestore($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = readCSV($csvFile, ',');
            // dd(collect($data)->take(5));
            $certsFile = $this->storage_path . '/' . "epaviolationscerts.csv";
            $certs = readCSV($certsFile, ',');
            // dd(collect($certs));

//            $certs = ViolationCertificate::all();

            foreach ($certs as $cert) {
                foreach ($data as $item) {
                    $d['name'] = null;
                    if ($cert[13] == $item[0]) {
                        $d['name'] = 'license_file';
                        $d['certificate_id'] = intVal($cert[0]) ?? null;

                        $detail = CertificateFileDetail::updateOrCreate($d, $d);
                        $x['name'] = $item[2];
                        $x['extension'] = $item[3];
                        $x['size'] = $item[4] ?? null;
                        $x['mime_type'] = $item[7] ?? null;
                        $detail->getFile()->create($x);
                    };
                    if ($cert[14] == $item[0]) {
                        $d['name'] = 'signature_file';
                        $d['certificate_id'] = intVal($cert[0]) ?? null;

                        $detail = CertificateFileDetail::updateOrCreate($d, $d);
                        $x['name'] = $item[2];
                        $x['extension'] = $item[3];
                        $x['size'] = $item[4] ?? null;
                        $x['mime_type'] = $item[7] ?? null;
                        $detail->getFile()->create($x);
                    };
                    if ($cert[15] == $item[0]) {
                        $d['name'] = 'civil_ssn_file';
                        $d['certificate_id'] = intVal($cert[0]) ?? null;

                        $detail = CertificateFileDetail::updateOrCreate($d, $d);
                        $x['name'] = $item[2];
                        $x['extension'] = $item[3];
                        $x['size'] = $item[4] ?? null;
                        $x['mime_type'] = $item[7] ?? null;
                        $detail->getFile()->create($x);
                    };
                    if ($cert[16] == $item[0]) {
                        $d['name'] = 'other_file';
                        $d['certificate_id'] = intVal($cert[0]) ?? null;

                        $detail = CertificateFileDetail::updateOrCreate($d, $d);
                        $x['name'] = $item[2];
                        $x['extension'] = $item[3];
                        $x['size'] = $item[4] ?? null;
                        $x['mime_type'] = $item[7] ?? null;
                        $detail->getFile()->create($x);
                    };
//                    $d['name'] = 'license_file';

                }
            }

//            foreach ($data as $key => $item){
//                if ($item){
//                    $certfileData = $this->prepareFilesData($item);
//                    $detail = CertificateFileDetail::create($certfileData);
//                    ViolationCertificate::create($certData);
//                }
//            }


        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
        return "done";

    }

    public function prepareCertificateData(array $item)
    {
        $statusHint = [
            "1" => 12,
            "2" => 13,
            "3" => 15,
            "4" => 16,
            "5" => 17,
        ];

        $data['id'] = $item[0];
        $data['company_name'] = $item[2];
        $data['owner_name'] = $item[3];
        $data['civil_ssn'] = $item[4];
        $data['license_number'] = $item[5];
        $data['email'] = $item[6];
        $data['mobile'] = $item[7];
        $data['phone'] = $item[8];

        $data['reason_id'] = intVal($item[9]) ?? null;
        $data['reason_desc'] = $item[10];
        $data['request_party_id'] = intVal($item[11]) ?? null;
        $data['request_party_name'] = $item[12];
        $data['status_id'] = $statusHint[$item[1]] ?? null;
        $data['certificate_no'] = $item[17] !== 'NULL' ? $item[17] : null;
        $data['admin_reason'] = $item[11];

        // $data['payed_at'] = $data['status_id'] == 16 ? Carbon::now()->format('Y:m:d H:m:s') : null;
        if ($item[23] !== 'NULL') {
            $data['payed_at'] = $item[23];

        }
        if ($item[23] !== 'NULL') {
            $data['expired_at'] = Carbon::parse($item[23])->addYear(1);
        }
//        $data['user_id'] = $item[1];
        $data['display_name'] = $item[24];
        $data['has_violation'] = 1;
        return $data;
    }

    public function _preparePaymentData(array $item)
    {

//        return $data;
    }

    public function compFeesRestore($csvFileName)
    {
        $csvFile = $this->storage_path . '/' . $csvFileName;
        $data = readCSV($csvFile, ',');
        $records = [];
        foreach ($data as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $records[] = $this->prepareCompFeesData($value);
        }

        foreach ($records as $record) {

            $subscription = (new TenderCompanySubscription())->create([
                'cost' => $record['amount'],
                'payment_type_id' => $record['payment_id'] == 0 ? 1 : 2,
                'company_id' => $record['company_id'],
                'payed_at' => Carbon::parse($record['date'] ?? null)
            ]);

            if ($record['payment_id'] != 0) {
                $payment = $subscription->getPaymentable()->create([
                    'status' => 1,
                    'cost' => (float)$record['amount'] ?? 0,
                ]);


                $payment->knet()->create([
                    'pay_id' => $payment->id,
                    'payment_id' => $record['knet_payment_id'],
                    'result' => $record['result_code'] ?? null,
                    'auth' => $record['auth_code'] ?? null,
                    'ref' => $record['reference_id'] ?? null,
                    'track_id' => $record['track_id'] ?? null,
                    'post_date' => $record['date'] ?? null,
                    'amount' => (float)$record['amount'] ?? 0,
                ]);

            } else {

                $payment = $subscription->getPaymentable()->create([
                    'status' => 1,
                    'cost' => (float)$record['amount'] ?? 0,
                ]);
            }

        }
        return $records;
    }

    public function pagesRestore($csvFileName)
    {
        $csvFile = $this->storage_path . '/' . $csvFileName;
        $data = readCSV($csvFile, ',');
        $records = [];
        foreach ($data as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $records[] = $this->preparePagesData($value, $key);
        }

        return $records;
    }

    public function violationRestore($csvFileName)
    {
        try {
            DB::beginTransaction();
            $csvFile = $this->storage_path . '/' . $csvFileName;
            $data = readCSV($csvFile, ',');
//              dd(collect($data)->take(1000));
            foreach ($data as $key => $value) {
                try {
                    if ($key == 3500) {
                        break;
                    }

                    if ($key < 3000) {
                        continue;
                    }
//                    dd("test");
//                    dd($this->prepareViolationData($value));
                    $violation = $this->violationPresenter->create($this->prepareViolationData($value))['data']['violation'];
                    if ($violation['status_id'] == "1") {
                        $violation->payed_at = Carbon::now()->format('Y:m:d H:m:s');
                        $violation->save();
                    }
                    if ($value[36] != "NULL") {
                        $payment = $violation->getPaymentable()->create($this->preparePaymentData($value));
                        $knet = $payment->knet()->create($this->prepareKnetData($value));
//                        dd($payment);
                    }
                } catch (\Exception $exception) {
                    dd($value);
                }
            }
        } catch (\Exception $exception) {
            dd($exception->getMessage());
            DB::rollBack();
        }
        DB::commit();
        return "done";
    }

    public function officersRestore($csvFileName)
    {
        $csvFile = $this->storage_path . '/' . $csvFileName;
        $data = readCSV($csvFile, ',');
        $records = [];
        foreach ($data as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $records[] = $this->prepareOfficersData($value);
        }

        return $records;
    }

    public function tendersRestore($csvFileName)
    {
        $csvFile = $this->storage_path . '/' . $csvFileName;
        $data = readCSV($csvFile, ',');
        dd($data);
        $records = [];
        foreach ($data as $key => $value) {
            $records[] = $this->prepareTendersData($value);
        }

        return $records;
    }

    // prepare data
    public function prepareCompFeesData($value)
    {
        $preparedData = [];
        $preparedData['company_id'] = $value[1] ?? '';
        $preparedData['date'] = $value[2] ?? '';
        $preparedData['year'] = $value[3] ?? '';
        $preparedData['amount'] = $value[4] ?? '';
        $preparedData['payment_id'] = $value[5] ?? '';
        $preparedData['knet_payment_id'] = $value[17] ?? '';
        $preparedData['track_id'] = $value[18] ?? '';
        $preparedData['reference_id'] = $value[19] ?? '';
        $preparedData['transaction_id'] = $value[20] ?? '';
        $preparedData['auth_code'] = $value[21] ?? '';
        $preparedData['result_code'] = $value[22] ?? '';

        return $preparedData;
    }

    public function preparePagesData($value, $order)
    {
        $preparedData = [];
        $preparedData['title_ar'] = $value[1] ?? '';
        $preparedData['title_en'] = $value[2] ?? '';
        $preparedData['order'] = $order ?? $value[7] ?? '';
        $preparedData['content'] = $value[6] ?? '';
        return $preparedData;
    }

    public function prepareOfficersData($value)
    {
        $preparedData = [];
        $preparedData['name'] = $value[1] ?? '';
        return $preparedData;
    }

    public function prepareViolationData($data)
    {
        $pData['id'] = $data[0] ?? '';
        $pData['civilian_name'] = $data[15] ?? '';
        $pData['civilian_ssn'] = $data[16] ?? '';
        $pData['civilian_nationality_id'] = 1;
        $pData['violation_serial'] = $data[3] ?? '';
        $pData['violation_block'] = $data[24] == "" ? 0 : $data[24];
        $pData['violation_details'] = $data[4] ?? '';
        $pData['violation_date'] = $data[6] == "0000-00-00" ? Carbon::now()->format('Y:m:d H:m:s') : Carbon::parse($data[6])->format('Y:m:d H:m:s');
//        $pData['violation_date'] =  \Carbon\Carbon::parse($data[6])->format('Y:m:d H:m:s') ??  \Carbon\Carbon::now()->format('Y:m:d H:m:s');
        $pData['violation_location_name'] = $data[8] ?? '';
        $pData['violation_area'] = $data[8] ?? '';
        $pData['violation_assign_approved'] = 1;
        $pData['violation_fine_cost'] = $data[23] == "" ? 0 : $data[23];
        $pData['violation_action_id'] = 2;
        $pData['violation_comments'] = $data[18] ?? '';
        $pData['violation_category_id'] = $data[2] == "p" ? 1 : 2;
        if ($data[35] == "0") {
            $pData['violation_status_id'] = 2;
        } else {
            $pData['violation_status_id'] = 1;
        }
        $pData['violation_payment_type_id'] = 2;
        $pData['main_officer_id'] = null;
        $officer = $this->officerPresenter->findByName($data[21]);
//        dd($officer);
        if ($officer['status']) {
            $pData['main_officer_id'] = $officer['data']['officer']['id'] ?? null;
        }
        $pData['company_name'] = $data[13] ?? '';
        //   $pData['company_location_activity'] = $data[2];
        //   $pData['company_location_licence'] = $data[2];
        $pData['company_location_address'] = $data[10] ?? '';

        return $pData;
    }

    public function prepareTendersData($data)
    {
        $pData['number'] = $data[1] ?? '';
        $pData['title_ar'] = $data[4] ?? '';
        $pData['title_en'] = $data[3] ?? '';
        $pData['type'] = $data[11] ?? '';
        $pData['allow_alternative'] = $data[12] ?? 0;
        $pData['allow_division'] = $data[13] ?? 0;
        $pData['comment'] = $data[14] ?? '';
        $pData['price'] = $data[15] ?? '';
        $pData['insurance'] = $data[16] ?? '';
        $pData['ctc_only'] = $data[17] ?? '';
        $pData['ctc_link'] = $data[18] ?? '';

//        $pData['order'] = $data[1];
//        $pData['status_id'] = $data[1];

        $pData['open_date'] = $data[6];
        if ($data[6] != "NULL") {
            $pData['open_date'] = Carbon::parse($data[6])->format('Y:m:d H:m:s') ?? null;
        }

        if ($data[9] != "NULL") {
            $pData['meeting_date'] = Carbon::parse($data[9])->format('Y:m:d H:m:s') ?? null;
        }
        if ($data[7] != "NULL") {
            $pData['last_app_date'] = Carbon::parse($data[7] . ' ' . $data[10])->format('Y:m:d H:m:s') ?? null;
        }

        $pData['last_app_date'] = $data[7];

        return $pData;
//        $pData['open_date'] = Carbon::parse($data[6])->format('Y:m:d H:m:s') ?? null;
//        $pData['meeting_date'] = Carbon::parse($data[9])->format('Y:m:d H:m:s') ?? null;
//        $pData['last_app_date'] = Carbon::parse($data[7] . ' '. $data[10])->format('Y:m:d H:m:s') ?? null;

    }

    public function prepareBuyerData($data)
    {
        $tenderData['number'] = $data[1] ?? '';
        $tenderData['title_ar'] = $data[4] ?? '';
        $tenderData['title_en'] = $data[3] ?? '';
        $tenderData['type'] = $data[11] ?? '';
        $tenderData['allow_alternative'] = $data[12] ?? 0;
        $tenderData['allow_division'] = $data[13] ?? 0;
        $tenderData['comment'] = $data[14] ?? '';
        $tenderData['price'] = $data[15] ?? '';
        $tenderData['insurance'] = $data[16] ?? '';
        $tenderData['ctc_only'] = $data[17] ?? '';
        $tenderData['ctc_link'] = $data[18] ?? '';
        $tenderData['open_date'] = $data[6];
        if ($data[6] != "NULL") {
            $tenderData['open_date'] = Carbon::parse($data[6])->format('Y:m:d H:m:s') ?? null;
        }
        if ($data[9] != "NULL") {
            $tenderData['meeting_date'] = Carbon::parse($data[9])->format('Y:m:d H:m:s') ?? null;
        }
        if ($data[7] != "NULL") {
            $tenderData['last_app_date'] = Carbon::parse($data[7] . ' ' . $data[10])->format('Y:m:d H:m:s') ?? null;
        }
        $tenderData['last_app_date'] = $data[7];

        $companyData['reference_code'] = $value[1] ?? '';
        $companyData['civil_name'] = $value[2] ?? '';
        $companyData['civil_ssn'] = $value[3] ?? '';
        $companyData['email'] = $value[4] ?? '';
        $companyData['name_ar'] = $value[5] ?? '';
        $companyData['name_en'] = $value[5] ?? '';
        $companyData['read_at'] = Carbon::parse($value[6] ?? '')->format('Y-m-d h:i:s');
        $companyData[''];

    }

    public function prepareTenderCompaniesData($value)
    {
        $preparedData = [];
        $preparedData['reference_code'] = $value[1] ?? '';
        $preparedData['civil_name'] = $value[2] ?? '';
        $preparedData['civil_ssn'] = $value[3] ?? '';
        $preparedData['email'] = $value[4] ?? '';
        $preparedData['name_ar'] = $value[5] ?? '';
        $preparedData['name_en'] = $value[5] ?? '';
        $preparedData['read_at'] = Carbon::parse($value[6] ?? '')->format('Y-m-d h:i:s');
        return $preparedData;


    }

    public function preparePaymentData($data)
    {
        $pData['id'] = $data[36] ?? '';
        $pData['name'] = $data[27] ?? '';
        $pData['email'] = $data[28] ?? '';
        $pData['phone'] = $data[29] ?? '';
        $pData['cost'] = $data[23] ?? '';
        $pData['status'] = $data[50] ?? 0;
        $pData['check_info'] = null;

        return $pData;
    }

    public function prepareKnetData($data)
    {
        $pData['id'] = $data[36] ?? '';
        $pData['payment_id'] = $data[44] ?? '';
        $pData['result'] = $data[49] ?? '';
        $pData['ref'] = $data[46] ?? 0;
        $pData['tran_id'] = $data[47];
        $pData['track_id'] = $data[45] ?? '';
        $pData['amount'] = $data[38];
        $pData['auth_code'] = $data[48];
        return $pData;
    }


}
