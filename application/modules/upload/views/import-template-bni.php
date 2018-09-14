<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
            <h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
        </div>
        <div class="col-xs-12 col-sm-5 text-right">
            <h1>
                <a class="btn btn-primary btn-s" href="<?php echo base_url(); ?>assets/template-import/TEMPLATE_UPLOAD_BNI.xlsx">
                    Download Template &nbsp;&nbsp;
                    <i class="fa fa-download"></i>
                </a>
                <a class="btn btn-success btn-s submit-form" data-form-target="hsbc-form">
                    Upload Data Excel &nbsp;&nbsp;
                    <i class="fa fa-upload"></i>
                </a>
            </h1>
        </div>
    </div>

    <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <article class="col-sm-12">

                <!-- widget -->
                <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-001" data-widget-editbutton="false" data-widget-deletebutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-circle-o-notch"></i> </span>
                        <h2>Import Data Sections</h2>
                    </header>
                    <div>
                        <div class="widget-body no-padding">
                            <form class="smart-form" id="hsbc-form" action="<?php echo site_url('upload/process_import_hsbc'); ?>" method="POST">
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-12">
                                            <label class="label">File Import (xls / xlsx) <sup class="color-red">*</sup></label>
                                            <label class="input">
                                                <input type="file" name="file" />
                                            </label>
                                            <div class="note">
                                                &nbsp;&nbsp;Please download template before. 
                                            </div>
                                        </section>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

            </article>
        </div>

    </section> <!-- end widget grid -->
</div> <!-- END MAIN CONTENT -->
