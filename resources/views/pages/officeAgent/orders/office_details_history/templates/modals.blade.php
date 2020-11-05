{{--company_attachment_modal--}}

<!-- Modal done -->
<div class="modal fade" id="files_viewer_modal" tabindex="-1" role="dialog"
     aria-labelledby="files_viewer_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="bg-white" style="overflow:hidden;padding: 9px;font-size: 21px;font-weight: bold;">
                <div class=" float-left" id="file_name_viewer"></div>
                <div class="float-right" id="loop_page_viewer"></div>
            </div>
            <div class="bg-white" style="overflow:hidden;padding: 9px;font-size: 21px;font-weight: bold;">
                <button class="btn btn-info float-left" onclick="showNextFile()">التالى</button>
                <button class="btn btn-info float-right" onclick="showPrevFile()">السابق</button>
            </div>
            <iframe id="file_viewer_frame" src="" width="100%" frameborder="0" height="700px"></iframe>
        </div>

    </div>
</div>