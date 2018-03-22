<?php
$this->load->view('commons/header');
$total = count($all_task_project);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tasks
            <!--<small>Add Subject</small>-->
        </h1>

    </section>
    <?php echo $this->session->flashdata('msg'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12 rem">
                <div class="box">
                    <div class="box-header">
                        <!-- <h3 class="box-title">Data Table With Full Features</h3>-->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">

                            <div class="col-lg-12  form-group">
                                <div class="col-lg-9 rem_padd">
                                    <a class="btn btn-primary pad mybtn_primary"
                                       href="<?php echo base_url() . $this->config->item('task_path') . 'manage_task' ?>">All
                                        Tasks</a> &nbsp;
                                    <a class="btn btn-primary pad mybtn_primary" id="hold_task" href="#">Hold Tasks</a>
                                    &nbsp;
                                    <a class="btn btn-primary pad mybtn_primary" id="in_prog_task" href="#">In Progress
                                        Tasks</a> &nbsp;
                                    <a class="btn btn-primary pad mybtn_primary" id="com_task">Complete Tasks</a> &nbsp;
                                    <a class="btn btn-primary pad mybtn_primary" id="my_task">My Tasks</a>
                                </div>
                                <div class="col-lg-3 text-right rem_padd">
                                    <a class="btn btn-primary pad mybtn_primary" data-toggle="modal"
                                       data-target="#add_project_modal" href="#"><i class="fa fa-plus"
                                                                                    aria-hidden="true"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="apend_sel_task">
                            <table id="data_table" class="table table-bordered table-striped icon_space all_tasks">
                                <thead>
                                <tr>
                                    <th>Sr.#</th>

                                    <th>Task</th>
                                    <th>Deadline</th>
                                    <th>Assigned To</th>
                                    <th>Prority</th>
                                    <th>Project</th>
                                    <th>Attachment</th>
                                    <!--<th>Description</th>-->

                                    <th width="100">Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                <? $k = 1;
                                if ($total != 0) {
                                    for ($i = 0; $i < $total; $i++) {
                                        $data_array = $this->dashboard_model->get_task_user($all_task_project[$i]['task_id']);

                                        $get_task_arrachment = $this->dashboard_model->get_task_arrachment($all_task_project[$i]['task_id']);


                                        ?>

                                        <tr id="pr<?= $all_task_project[$i]['task_id']; ?>">
                                            <td><?php echo $k; ?></td>

                                            <td><?= $all_task_project[$i]['name']; ?></td>

                                            <td><?= $all_task_project[$i]['deadline']; ?></td>
                                            <td><?php echo implode(",", $data_array); ?></td>
                                            <td>
                                                <?php if ($all_task_project[$i]['task_piority'] == 'p1') {
                                                    echo "<span title='critical' class='block'><span class='critical sm3'>P1</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> 
Critical&nbsp;&nbsp;</span>--></span>";
                                                } ?>
                                                <?php if ($all_task_project[$i]['task_piority'] == 'p2') {
                                                    echo "<span title='High' class='block'><span class='high sm3'>P2</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> High&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>--></span>";
                                                } ?>
                                                <?php if ($all_task_project[$i]['task_piority'] == 'p3') {
                                                    echo "<span title='Medium' class='block'><span class='medium sm3'>P3</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Medium</span>--></span>";
                                                } ?>
                                                <?php if ($all_task_project[$i]['task_piority'] == 'p4') {
                                                    echo "<span title='Low' class='block'><span class='low sm3'>P4</span><!--<span class='sm2'><i class='fa fa-circle' aria-hidden='true'></i> Low&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>--></span>";
                                                } ?></td>
                                            <td><?= $all_task_project[$i]['project_name']; ?></td>
                                            <td><?php echo implode(" ", $get_task_arrachment); ?></td>
                                            <!--<td><?= $all_task_project[$i]['description']; ?></td>-->

                                            <td><a data-toggle="modal" data-target="#get_task_data"
                                                   onclick="get_single_task('<?= $all_task_project[$i]['task_id']; ?>')"
                                                   class="btn btn-primary btn-icon btn-iconlast view" title="View"><i
                                                            class="fa fa-eye" aria-hidden="true"></i></a> <a
                                                        class="btn btn-primary btn-icon" data-toggle="modal"
                                                        data-target="#update_project_modal" href="#"
                                                        onclick="get_task('<?php echo $all_task_project[$i]['task_id'] ?>')"
                                                        title="Edit"><i class="fa fa-pencil-square-o"
                                                                        aria-hidden="true"></i></a><a
                                                        class="btn btn-danger btn-icon"
                                                        onclick="return confirm('Are you sure want to delete this record.')"
                                                        href="<?= base_url(); ?><?php echo $this->config->item('task_path'); ?>delete_task/<?= $all_task_project[$i]['task_id']; ?>"
                                                        title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </td>

                                        </tr>
                                        <? $k++;
                                    }
                                } ?>

                                </tbody>

                            </table>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('commons/footer'); ?>
<div id="add_project_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <form id="task_form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Task</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group cs_account_main">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Task Name</label>
                                <input type="subject" name="name" class="form-control" placeholder="Name"/>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label>Select Project</label>
                                    <select id="project_id" name="project_id" class="select2 form-control"
                                            style="width:100%">
                                        <option value="">Please select Project</option>
                                        <?php foreach ($all_project as $ap): ?>
                                            <option value="<?php echo $ap['project_id'] ?>"><?php echo $ap['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <label>Priority </label><br/>
                                <select class="form-control form-group" name="priority">
                                    <option value="">Select Priority</option>

                                    <option value="p1">P1</option>
                                    <option value="p2">P2</option>
                                    <option value="p3">P3</option>
                                    <option value="p4">P4</option>
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Status </label><br/>
                                    <select class="form-group form-control " name="status">
                                        <option value="0">Select Status</option>
                                        <option value="1">Complete</option>
                                        <option value="2">In Progress</option>
                                        <option value="3">On Hold or Not started</option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <div class="checks">
                                        <label>User </label><br/>

                                        <select class="form-group" multiple name="user[]" id="test">

                                            <?php foreach ($all_user as $au): ?>
                                                <option value="<?php echo $au['userid'] ?>"><?php echo $au['fullname'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 up_temp">
                                <div class="form-group">
                                    <label type="readonly">Date</label>
                                    <input id="datepicker" name="date" class="form-control"/>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

                                <label for="section">Description</label>
                                <textarea type="text" name="description" class="description form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

                                <label for="section">File</label>
                                <input type="file" multiple name="file_img[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="error_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
                    <div id="success_msg" style=" display:none;" class="alert custom-error alert-success"></div>

                </div>
                <div class="modal-footer">
                    <a href="#" id="submit_type2" class="btn btn-primary mybtn_primary">Save</a>

                    <button type="button" class="btn btn-default mybtn_primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </form>
        <input type="hidden" value="<?php echo base_url(); ?>" id="base_url"/>
    </div>
</div>


<div id="update_project_modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <form id="update_task_form" name="update_task_form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Task</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group cs_account_main">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Task Name</label>
                                <input type="text" name="name" id="name" class="form-control"/>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="section">Project </label>
                                    <select class="select2 form-control" name="project_id" id="project">
                                        <option value="">Select Project</option>
                                        <?php foreach ($all_project as $ap): ?>
                                            <option value="<?php echo $ap['project_id'] ?>"><?php echo $ap['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Priority </label><br/>
                                <select class=" form-group form-control" name="priority" id="task_piority">
                                    <option value="">Select Priority</option>

                                    <option value="p1">P1</option>
                                    <option value="p2">P2</option>
                                    <option value="p3">P3</option>
                                    <option value="p4">P4</option>
                                </select>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Status </label><br/>
                                    <select class="form-group form-control" name="status" id="task_status">
                                        <option value="0">Select Status</option>
                                        <option value="1">Complete</option>
                                        <option value="2">In Progress</option>
                                        <option value="3">On Hold or Not started</option>


                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="checks">
                                        <label>User </label><br/>

                                        <select class="form-group" multiple name="user[]" id="user">
                                            <?php foreach ($all_user as $au): ?>
                                                <option value="<?php echo $au['userid'] ?>"><?php echo $au['fullname'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 up_temp">
                                <div class="form-group">
                                    <label for="section">Date </label>
                                    <input type="text" id="deadline_dead" readonly name="date"
                                           class="form-control datepicker"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

                                <label for="section">Description</label>
                                <textarea type="text" name="description" id="description2" class="description"
                                          class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

                                <label for="section">File</label>
                                <input type="file" multiple name="file_img[]"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="error_2_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
                    <div id="success_2_msg" style=" display:none;" class="alert custom-error alert-success"></div>

                </div>
                <input type="hidden" name="task_id" id="task_id"/>
                <div class="modal-footer">
                    <a href="#" id="update_task" class="btn btn-primary mybtn_primary">Update</a>

                    <button type="button" class="btn btn-default mybtn_primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </form>
        <input type="hidden" value="<?php echo base_url(); ?>" id="base_url"/>
    </div>
</div>
<!------------ get task data ----------->
<div id="get_task_data" class="modal fade modalfadeup" role="dialog" style="width: 720px; padding-left:0;">
    <div class="modal-dialog">
        <form id="task_form" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">View Task</h4>
                </div>
                <div class="modal-body col-lg-12">
                    <div class="import_task_data">

                    </div>


                </div>
                <div class="col-lg-6">
                    <div id="error_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
                    <div id="success_msg" style=" display:none;" class="alert custom-error alert-success"></div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default mybtn_primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!------------ get task data ----------->

<script>
    $("#submit_type2").click(function () {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = new FormData($('#task_form')[0]);

        $.ajax({
            type: "POST",
            url: '<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>' + "save_task",
            data: formData,
            processData: false,  //Add this
            contentType: false, //Add this
            success: function (response) {
                var obj = jQuery.parseJSON(response);
                //alert(obj.status);
                if (obj.status == 0) {
                    $("#error_msg").html(obj.message).show();
                    setTimeout(function () {
                        $('#error_msg').fadeOut('slow');
                    }, 5000);
                } else {
                    $("#success_msg").html(obj.message).show();
                    setTimeout(function () {
                        $('#success_msg').fadeOut('slow');
                    }, 5000);
                    setTimeout(function () {
                        window.location.replace("<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>" + "manage_task");
                    }, 2000);
                    //	$(".append_data").append(obj['data']);
                    //alert(1);
                    /*	var dt = $('#data_table').DataTable();;
                     //alert(obj.identification);
                     var rowid =dt.row.add( [
                     obj.name,
                     obj.description,
                     '<a class="btn btn-primary btn-icon" href="#" data-toggle="modal" onclick="get_project('+obj.project_id+')" data-target="#update_project_modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="btn btn-danger btn-icon" onclick="return confirm('+"'Are you sure want to delete this record.'"+')" href= ?>delete_project/'+obj.project_id+'><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
                     ] ).draw( false );
                     var theNode = $('#data_table').dataTable().fnSettings().aoData[rowid[0]].nTr;
                     theNode.setAttribute('id',"pr"+obj.project_id);
                     $("#validation_form")[0].reset();
                     CKEDITOR.instances.description.setData();
                     $("#success_msg").html(obj.message).show();

                     setTimeout(function() {
                     $('#success_msg').fadeOut('slow');
                     }, 5000);*/

                }
            }
        });
        return false;
    });

    function get_task(id) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>' + "edit_task/" + id,
            success: function (response) {
                var obj = jQuery.parseJSON(response);
                //alert(response);
                //CKEDITOR.instances.ck_editor2.setData( '<p>This is the editor data.</p>' );
                $("#name").val(obj['task'].name);
                CKEDITOR.instances.description2.setData(obj['task'].description);
                $("#task_id").val(obj['task'].task_id);
                $("#deadline_dead").val(obj['task'].deadline);
                $("#project").val(obj['task'].project_id);
                $("#task_piority").val(obj['task'].task_piority);
                $("#task_status").val(obj['task'].task_status);


                var fld = document.getElementById('user');
                //$("#user").val(obj['task'].user_id);
                $("#row_id").val(id);
                //alert(obj['user_task'].length);
                for (i = 0; i < obj['user_task'].length; i++) {
                    var ids = obj['user_task'][i].user_id;
                    $('#user option[value=' + ids + ']').attr("selected", "selected");
                }
                $('#user').multiselect('refresh');
                $('#user').multiselect({

                    includeSelectAllOption: true

                });

                //$('#user').multiselect('rebuild');

                //	$('#user').multiselect();
            }


        });
        return false;

    }


    $("#update_task").click(function () {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        var formData = new FormData($('#update_task_form')[0]);
        $.ajax({
            type: "POST",
            url: '<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>' + "update_task",
            data: formData,
            processData: false,  //Add this
            contentType: false, //Add this
            success: function (response) {
                //alert(response);return false;
                var obj = jQuery.parseJSON(response);
                if (obj.status == 0) {
                    //alert(obj.message);
                    $("#error_2_msg").html(obj.message).show();

                    setTimeout(function () {
                        $('#error_2_msg').fadeOut('slow');
                    }, 5000);
                } else {
                    $("#success_2_msg").html(obj.message).show();
                    setTimeout(function () {
                        $('#success_msg').fadeOut('slow');
                    }, 5000);
                    setTimeout(function () {
                        window.location.replace("<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>" + "manage_task");
                    }, 2000);
                    /*	var row_val=$("#row_id").val();

                     //alert(row_val);
                     //$("#pr"+row_val).remove();
                     var table = $('#data_table').DataTable();
                     table.row("#pr"+row_val).remove();
                     //	table.row.add( obj['data'] ).draw();

                     //$("#append_data").append(obj['data']);
                     //$(obj['data']).appendTo(".append_data");
                     //	$(".append_data").append(obj['data']);
                     var dt = $('#data_table').DataTable();

                     var rowid =dt.row.add( [
                     obj.name,
                     obj.description,
                     '<a class="btn btn-primary btn-icon" href="#" data-toggle="modal" onclick="get_project('+obj.project_id+')" data-target="#update_project_modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a class="btn btn-danger btn-icon" onclick="return confirm('+"'Are you sure want to delete this record.'"+')" href=<delete_project/'+obj.project_id+'><i class="fa fa-trash-o" aria-hidden="true"></i></a>'
                     ] ).draw( false );
                     var theNode = $('#data_table').dataTable().fnSettings().aoData[rowid[0]].nTr;
                     theNode.setAttribute('id',"pr"+obj.project_id);
                     //dt.row.add(obj['data']);
                     //dt.draw();
                     //	var table = $('#data_table').DataTable();
                     //	table.ajax.reload()
                     $("#update_project_modal").modal('hide');
                     */


                }

            }
        });
        return false;
    });


    $(function () {


        CKEDITOR.replace('description');

        CKEDITOR.replace('description2');
    });

</script>
<script>
    $(document).ready(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd"});
        $("#deadline_dead").datepicker({dateFormat: "yy-mm-dd"});
    });
</script>
<script type="text/javascript">

    $(document).ready(function () {

        $('#test').multiselect();

    });

</script>
<script>
    function get_single_task(task_id) {

        //	alert(task_id);
        //	return false;

        $.ajax({

            type: "POST",

            url: '<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>' + "get_single_task/" + task_id,

            success: function (response) {

                //alert(response);return false;

                $(".import_task_data").html(response)

                $("#get_sinlge_task").DataTable({})

                //return false;
            }
        });
        return false;
    }


    $(document).ready(function () {

        $("#datepicker").datepicker({dateFormat: "yy-mm-dd"});
    });
</script>
<!------- hold hold_task ------------>
<script>

    $('#hold_task').click(function () {


        $.ajax({

            type: "POST",

            url: '<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>' + "hold_task/",

            success: function (response) {

                //alert(response);return false;
                $(".all_tasks").hide();
                $(".apend_sel_task").html(response)

                $("#hold-tasks").DataTable({
                    "iDisplayLength": 100,
                    "dom": '<"top"f>rt<"bottom"lip><"clear">',
                    "order": [[0, "asc"]],


                })

                //return false;
            }
        });

    });

</script>
<script>

    $('#in_prog_task').click(function () {


        $.ajax({

            type: "POST",

            url: '<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>' + "in_prog_task/",

            success: function (response) {

                //alert(response);return false;
                $(".all_tasks").hide();
                $(".hold-tasks").hide();
                $(".apend_sel_task").html(response)

                $("#in_pro_task").DataTable({
                    "iDisplayLength": 100,
                    "dom": '<"top"f>rt<"bottom"lip><"clear">',
                    "order": [[0, "asc"]],


                })

                //return false;
            }
        });

    });

    $('#com_task').click(function () {


        $.ajax({

            type: "POST",

            url: '<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>' + "com_task/",

            success: function (response) {

                //alert(response);return false;
                $(".all_tasks").hide();
                $(".hold-tasks").hide();
                $(".in_prog_tasks").hide();
                $(".apend_sel_task").html(response)

                $("#compl_tsk").DataTable({
                    "iDisplayLength": 100,
                    "dom": '<"top"f>rt<"bottom"lip><"clear">',
                    "order": [[0, "asc"]],


                })

                //return false;
            }
        });

    });


    $('#my_task').click(function () {


        $.ajax({

            type: "POST",

            url: '<?php echo base_url()?><?php echo $this->config->item('task_path'); ?>' + "my_task/",

            success: function (response) {

                //alert(response);return false;
                $(".all_tasks").hide();
                $(".hold-tasks").hide();
                $(".in_prog_tasks").hide();
                $(".com_tasks").hide();
                $(".apend_sel_task").html(response)

                $("#my_task_tsk").DataTable({
                    "iDisplayLength": 100,
                    "dom": '<"top"f>rt<"bottom"lip><"clear">',
                    "order": [[0, "asc"]],


                })

                //return false;
            }
        });

    });
</script>
<!------- hold hold_task END ------------>