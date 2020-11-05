<?php

namespace App\Http\Controllers\Web\Violation;

use App\Http\Controllers\Api\ParagraphPunishmentController;
use App\Http\Controllers\Api\UtilityController;
use App\Http\Controllers\Api\SubjectRuleController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectPunsihmentController extends Controller
{
    private $utility;
    private $subject;
    private $punishments;

    public function __construct()
    {
        $this->utility = new UtilityController();
        $this->subject = new SubjectRuleController();
        $this->punishments = new ParagraphPunishmentController();
    }

    public function getAttachView()
    {
        $page_title = '';
        $response = $this->subject->index();
        $response2 = $this->punishments->index();
        $subjects = collect([]);
        $subject_punishment = $this->utility->getParagraphPivote(\request())['data']['paragraphs'] ?? [];

        if ($response['status']) {
            $subjects = $response['data']['subjects'];
        }

        if (!count($subjects)) {
            return back()->with('error', __('violation.error'));
        }

        $punishments = collect([]);

        if ($response2['status']) {
            $punishments = $response2['data']['punishment'];
        }

        // return $subject_punishment;
        return view('pages.violation.subject.attachPunishment.index', compact('page_title', 'subjects', 'punishments','subject_punishment'));
    }


    public function handleAttachPunishment(Request $request)
    {

        $response = $this->subject->relateSubjectWithPunishment($request);

        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }

        return back()->with('success', __('violation.success'));
    }
    public function handleDeletePunishment(Request $request)
    {

        $response = $this->utility->deleteParagraphPivot($request->get('id'));
        
        return $response;
        if (!$response['status']) {
            return back()->withErrors($response['data']['validation_errors'])->withInput();
        }

        return back()->with('success', __('violation.success'));
    }
}
