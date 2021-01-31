<?php
ob_start();
session_start();

 $pagetitle = 'المشرفين';
include 'init.php';
if(isset($_SESSION['name'])){

 if(isset($_GET['do'])){
     if($_GET['do'] == 'approve'){
         if(isset($_GET['id'])){
            $idd = $_GET['id'];
            $stmt=$con->prepare("UPDATE admin SET  grouped = 1   WHERE id = ?");
            $stmt->execute(array( $idd));
            header("Location: admin.php");

         }else{
             header("Location: admin.php");
         }
     }elseif($_GET['do'] == 'delete'){
        if(isset($_GET['id'])){
            $idd = $_GET['id'];
            $check = (checkitem('id','admin'));
            if($check > 1){
                $stmt=$con->prepare("DELETE FROM  admin WHERE id = :zid");
                $stmt->bindparam('zid',$idd);
                $stmt->execute();
                header("Location: admin.php");
            }else{

                echo "<div class='container alert alert-danger'>  عفوا لا يوجد مشرف غير هذا ولا يمكن حذفه </div>";
                header("Refresh:2; url=admin.php");
                exit();
            }
         
          

         }else{
             header("Location: admin.php");
         }
     }elseif($_GET['do'] == 'edit'){
        if(isset($_GET['id'])){
            $idd = $_GET['id'];
            $row = select('*','admin',"WHERE id = $idd");
            if(isset($_POST['edit'])){
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $oldpassword = $_POST['oldpass'];
                $newpassword = $_POST['newpass'];

                $password = $row['password'];

                if($oldpassword == $password){

                    if(empty($newpassword)){
                   
                        $stmt=$con->prepare("UPDATE admin SET  name = ?, phone = ? , password = ?  WHERE id = ?");
                        $stmt->execute(array( $name ,$phone , $oldpassword , $idd));
                        header("Location: admin.php");
                            exit();
                    }else{
                      
                             
                             $stmt=$con->prepare("UPDATE admin SET  name = ?, phone = ? , password = ?  WHERE id = ?");
                             $stmt->execute(array( $name ,$phone , $newpassword , $idd));
                             header("Location: admin.php");
                                 exit();
                       }
                }elseif(empty($oldpassword)){

                    $stmt=$con->prepare("UPDATE admin SET  name = ?, phone = ? , password = ?  WHERE id = ?");
                    $stmt->execute(array( $name ,$phone , $password , $idd));
                    header("Location: admin.php");
                        exit();
                }else{
                    echo "<div class ='alert alert-danger container'>الرقم السرى القديم غير صحيح</div>";
                    header("Refresh:2; url=admin.php?do=edit&id=$idd");
                    exit();
                }
            }
           ?>
          <div class="col-lg-12">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">تعديل المشرف</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">اسم العميل</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" value="<?php echo $row['name']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم التليفون</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="phone" value="<?php echo $row['phone']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">الرقم السرى القديم</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="oldpass"  type="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">الرقم السرى الجديد</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="newpass"  type="password">
                                    </div>
                                </div>
                         
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                      
                                        <button class="btn btn-primary" name='edit'>تعديل</button>
                                    </div>
                                </div>
                            </form>
                            <a href="admin.php"> <button class="btn btn-secondary btn-block" >الغاء</button></a>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>

    <?php   
    
}else{
             header("Location: admin.php");
         }
     }
 }else{

 

?>
<div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
            <div class="row">
              
              <div class="col-lg-12 col-md-12 ">
                  <div class="card">
                      <div class="card-body">
                          <div class="stat-widget-five">
                              <div class="stat-icon dib flat-color-4">
                                  <i class="pe-7s-users"></i>
                              </div>
                              <div class="stat-content">
                                  <div class="text-left dib">
                                     
                                      <div class="stat-heading">المشرفين</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

        <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title pull-right">المشرفين </h4>
                                  
                                </div>
                                <div class="card-body--">
                                <table id="dtBasicExample" class="table table-striped table-bordered table-sm text-center" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                            <th class="th-sm">التحكم 
                                            </th>
                                          
                                            <th class="th-sm">رقم الهاتف
                                            </th>
                                            <th class="th-sm">الاسم
                                            </th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $rows=selectall('id,name,phone,grouped','admin');
                                                foreach($rows as $row){
                                            ?>
                                            <tr>
                            <td>
                                <?php if($row['grouped'] == 0){?>

                                 <a href="?do=approve&id=<?php echo $row['id'];?>"><button type="button" class="btn btn-success save-event waves-effect waves-light">اجعل المشرف</button></a>
                                 <a href="?do=delete&id=<?php echo $row['id'];?>">   <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">حذف </button></a>
                               
                                 <?php }else{?>
                                  <a href="?do=edit&id=<?php echo $row['id'];?>"><button type="button" class="btn btn-success save-event waves-effect waves-light">تعديل المشرف </button></a>
                                  <a href="?do=delete&id=<?php echo $row['id'];?>">   <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">حذف المشرف</button></a>
                                <?php }?>        
                                </td>
                                      
                                            <td><?php echo  $row['phone']?></td>
                                            <td><?php echo  $row['name']?></td>
                                            
                                          
                                            </tr>
                                                <?php }?>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th class="th-sm">التحكم 
                                            </th>
                                            <th class="th-sm">رقم الهاتف
                                            </th>
                                            <th class="th-sm">الاسم
                                            </th>
                                            
                                            </tr>
                                        </tfoot>
                                </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    
                    </div>
            </div>
</div>
<?php
    include 'includes/footer.php';

  
    
ob_end_flush();
}
    }else{
        header("Location: login.php");
    }
?>