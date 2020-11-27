<?php $__env->startSection('konten'); ?>


<div class="row">
  <div class="col-12">
    <button type="button" class="btn btn-success mb-2" id="create">Tambah Student</button>
      <table class="table table-primary table-responsive-lg">
      <thead>
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody id="students-list">
          <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($student->id); ?></td>
              <td><?php echo e($student->name); ?></td>
              <td><?php echo e($student->phone_number); ?></td>
              <td><?php echo e($student->email); ?></td>
              <td>
                  <div class="btn-group" role="group" aria-label="Action">
                  <button type="button" class="btn btn-primary" id="edit" data-id="<?php echo e($student->id); ?>"><i class="fa fa-edit"></i></button>
                  <button type="button" class="btn btn-danger" id="delete" data-id="<?php echo e($student->id); ?>"><i class="fa fa-trash"></i></button>
                  </div>
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
      </table>
      <?php echo e($students->links()); ?>

  </div>
</div>


<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Isian Form Tentang <b>Student</b></h4>
            </div>
            <form id="studentForm" name="studentForm" class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" name="student_id" id="student_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-6 control-label">Nama</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="col-sm-6 control-label">Nomor Telepon</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Masukkan Nomor Telpon" value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-6 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Alamat Email" value="" required="">
                        </div>
                    </div>
                </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes</button>
          </div>
          </form>
      </div>
  </div>
</div>


<div class="modal fade" id="ajax-delete-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data Student</h4>
            </div>
            <div class="modal-body">
                <p>Apa Anda Yakin Ingin Menghapusnya?</p>
            </div>
            <div class="modal-footer">
                <form>
                    <input type="hidden" id="id_delete">
                    <button type="submit" class="btn btn-danger" id="btn-confirm">Ya, hapus!</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*  When student click add student button */
    $('body').on('click', '#create', function () {
        $('#btn-save').val("create");
        $('#studentForm').trigger("reset");
        $('#ajax-crud-modal').modal('show');
    });

    /* When click edit student */
    $('body').on('click', '#edit', function () {
        var student_id = $(this).data('id');

        $('#btn-save').val("edit");
        $('#ajax-crud-modal').modal('show');

        $.get('studentedit/'+ student_id +'/edit', function (data) {
            $('#student_id').val(data.id);
            $('#name').val(data.name);
            $('#phone_number').val(data.phone_number);
            $('#email').val(data.email);
        })
    });


    //delete student login
    $('body').on('click', '#delete', function () {
        $('#id_delete').val($(this).data('id'));
        $('#ajax-delete-modal').modal('show');
    });
    $('#ajax-delete-modal').on('click', '#btn-confirm', function() {
        $.ajax({
            type: "DELETE",
            url: "studentedit/" + $('#id_delete').val(),
            success: function (data) {
                $("#student_id_" + $('#id_delete').val()).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });


    if ($("#studentForm").length > 0) {
        $("#studentForm").validate({

            submitHandler: function(form) {
                var actionType = $('#btn-save').val();
                $('#btn-save').text('Sending..');

                $.ajax({
                    data: $('#studentForm').serialize(),
                    url: "studentedit/store",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        var student = '<tr id="student_id_' + data.id + '"><th></th><td>' + data.name + '</td><td>' + data.phone_number + '</td><td>' + data.email + '</td>';
                            student += '<td><div class="btn-group" role="group" aria-label="Action">';
                            student += '<button type="button" id="edit-student" data-id="' + data.id + '" class="btn btn-primary"><i class="fa fa-edit"></i></button>';
                            student += '<button type="button" id="delete-student" data-id="' + data.id + '" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
                            student +='</div></td></tr>';
                        if (actionType == "create") {
                            $('#students-list').prepend(student);
                        } else {
                            $("#student_id_" + data.id).replaceWith(student);
                        }
                        $('#studentForm').trigger("reset");
                        $('#ajax-crud-modal').modal('hide');
                        $('#btn-save').text('Save Changes');

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#btn-save').text('Save Changes');
                    }
                });
            }
        });
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\User\Documents\Eannovate\Eannovates\resources\views/edit/student.blade.php ENDPATH**/ ?>