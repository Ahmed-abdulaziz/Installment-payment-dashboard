<?php
ob_start();
session_start();
$pagetitle = 'العملاء';
include 'init.php';


if(isset($_SESSION['name'])){
  
            
                               
                     
?>
        <!-- Breadcrumbs-->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li class="active">العملاء</li>
                                    <li ><a href="index.php">الرئيسيه </a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.breadcrumbs-->
        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
           <?php 
           if(isset($_GET['do'])){
                if($_GET['do'] == 'add'){

                    if(isset($_POST['add'])){

                        $name               =  $_POST['name'];
                        $code               = $_POST['code'];
                        $client_address     = $_POST['client_address'];
                        $phone              = $_POST['phone'];
                        $ssd                = $_POST['ssd'];
                        $bike               = $_POST['bike'];
                        $paid               = $_POST['paid'];
                        $Purchase_price     = $_POST['Purchase_price'];
                        $total_amount       = $_POST['total_amount'];
                        $residual           =$_POST['residual'];
                        $num_install        =  $_POST['num_install'];
                        $install_value      = $_POST['install_value'];
                        $guarantor_name     = $_POST['guarantor_name'];
                        $guarantor_phone    = $_POST['guarantor_phone'];
                        $guarantor_address  = $_POST['guarantor_address'];
                        $guarantor_ssd      = $_POST['guarantor_ssd'];
                        $start_date         = $_POST['start_date'];
                        
                   
                        $check = checkitem('card_number','users',"WHERE card_number =$ssd");
                        if($check > 0){
                                echo "<div class ='alert alert-danger container'> عذرا رقم البطاقه موجود</div>";
                                header("Refresh:3; url=action.php?do=add");
                                exit();
                        }else{

                        $stmt=$con->prepare("INSERT INTO users (name ,Client_address , Client_code , card_number , Client_phone , bike_type ,Purchase_price , total_amount, paid_up , Residual , num_installments ,installment_value ,  Guarantor_name , Guarantor_phone , Guarantor_address ,card_number_Guarantor , Installment_start) 
                                                 VALUES (:zname ,:zClient_address,:zClient_code , :zcard_number , :zClient_phone ,:zbike_type,:zPurchase_price , :ztotal_amount ,:zpaid_up, :zResidual, :znum_installments ,:zinstallment_value , :zGuarantor_name , :zGuarantor_phone ,:zGuarantor_address , :zcard_number_Guarantor , :zInstallment_start)");
                        $stmt->execute(array(
                            'zname'   =>  $name,
                            'zClient_address' => $client_address,
                            'zClient_code'   =>  $code,
                            'zcard_number' => $ssd,
                            'zClient_phone'   =>  $phone,
                            'zbike_type' => $bike,
                            'zpaid_up'   =>  $paid,
                            'zPurchase_price' => $Purchase_price,
                            'ztotal_amount'   =>  $total_amount,
                            'zResidual' => $residual,
                            'znum_installments'   =>  $num_install,
                            'zinstallment_value'   =>  $install_value,
                            'zGuarantor_name' => $guarantor_name,
                            'zGuarantor_phone'   =>  $guarantor_phone,
                            'zGuarantor_address' => $guarantor_address,
                            'zcard_number_Guarantor'   =>  $guarantor_ssd,
                            'zInstallment_start'   =>  $start_date
                            
                        ));
                        echo "<div class ='alert alert-success container'>تم اضافة العميل</div>";
                        header("Refresh:3; url=index.php");
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
                            <h3 class="mb-0 text-center">اضافة عميل</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">اسم العميل</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" required type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">كود العميل</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="code" required type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">عنوان العميل</label>
                                    <div class="col-lg-9">
                                        <input class="form-control " name="client_address" required type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم التليفون</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="phone"  required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم البطاقه</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="ssd" required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">نوع الدراجه</label>
                                    <div class="col-lg-9">
                                         <input class="form-control" name="bike" required type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> ثمن الشراء</label>
                                    <div class="col-lg-9">
                                         <input class="form-control" name="Purchase_price" required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المبلغ الكلى </label>
                                    <div class="col-lg-9">
                                         <input class="form-control" name="total_amount" required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المدفوع</label>
                                    <div class="col-lg-9">
                                            <input class="form-control" name="paid" required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المتبقى </label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="residual" required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">عدد الاقسااط</label>
                                    <div class="col-lg-9">
                                             <input class="form-control" name="num_install" required type="number">                 
                                     </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">قيمة القسط </label>
                                    <div class="col-lg-9">
                                             <input class="form-control" name="install_value" required type="number">                 
                                     </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">اسم الضامن</label>
                                    <div class="col-lg-9">
                                           <input class="form-control" name="guarantor_name" required type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">تليفون الضامن</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" name="guarantor_phone" required type="number">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">عنوان الضامن</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="guarantor_address" required type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم بطاقة الضامن</label>
                                    <div class="col-lg-9"> 
                                    <input class="form-control" name="guarantor_ssd" required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">بداية القسط</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" type="date" name="start_date" required  id="example-datetime-local-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                       
                                        <button class="btn btn-primary" name='add'>اضافه</button>
                                    </div>
                                </div>
                            </form>
                            <a href="index.php"> <input type="reset" class="btn btn-secondary btn-block" value="الغاء"></a>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
                    <?php }elseif($_GET['do'] == 'edit'){


                            if(isset($_GET['id'])){

                                $idd=$_GET['id'];
                                $row=select('*' , 'users' , "WHERE id = $idd");
                                
                                if(isset($_POST['edit'])){

                                    $name               =  $_POST['name'];
                                    $code               = $_POST['code'];
                                    $client_address     = $_POST['client_address'];
                                    $phone              = $_POST['phone'];
                                    $ssd                = $_POST['ssd'];
                                    $bike               = $_POST['bike'];
                                    $Purchase_price     = $_POST['Purchase_price'];
                                    $total_amount       = $_POST['total_amount'];
                                    $paid               = $_POST['paid'];
                                    $residual           =$_POST['residual'];
                                    $num_install        =  $_POST['num_install'];
                                    $install_value      = $_POST['install_value'];
                                    $guarantor_name     = $_POST['guarantor_name'];
                                    $guarantor_phone    = $_POST['guarantor_phone'];
                                    $guarantor_address  = $_POST['guarantor_address'];
                                    $guarantor_ssd      = $_POST['guarantor_ssd'];
                                    $start_date         = $_POST['start_date'];

                                    if(empty($start_date)){
                                        $row=select('Installment_start','users',"WHERE id = $idd");
                                        $start_date = $row['Installment_start'];
                                    }
                                    
                                    $stmt=$con->prepare("UPDATE users SET  name = ?, Client_address = ? , Client_code = ? , card_number = ? , Client_phone = ? , bike_type = ?,Purchase_price = ?,total_amount = ? , paid_up = ? , Residual = ? , num_installments = ? , installment_value = ? , Guarantor_name = ? , Guarantor_phone = ? , Guarantor_address = ? , card_number_Guarantor = ? , Installment_start = ?   WHERE id = ?");
                                    $stmt->execute(array( $name , $client_address ,$code , $ssd ,  $phone , $bike ,$Purchase_price , $total_amount ,  $paid ,$residual , $num_install ,  $install_value , $guarantor_name,   $guarantor_phone , $guarantor_address ,  $guarantor_ssd , $start_date  ,$idd));
                                  
                                    echo "<div class='container alert alert-success'>".$stmt->rowCount()." تم التعديل بنجاح </div>";
                                    header("Refresh:2; url=index.php");
                                    exit();
                                }
                          ?>
                             <div class="col-lg-12">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">تعديل</h3>
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
                                    <label class="col-lg-3 col-form-label form-control-label">كود العميل</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="code" value="<?php echo $row['Client_code']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">عنوان العميل</label>
                                    <div class="col-lg-9">
                                        <input class="form-control " name="client_address" value="<?php echo $row['Client_address']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم التليفون</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="phone" value="<?php echo $row['Client_phone']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم البطاقه</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="ssd" value="<?php echo $row['card_number']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">نوع الدراجه</label>
                                    <div class="col-lg-9">
                                         <input class="form-control" name="bike" value="<?php echo $row['bike_type']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> ثمن الشراء</label>
                                    <div class="col-lg-9">
                                         <input class="form-control" name="Purchase_price" value="<?php echo $row['Purchase_price']?>"  required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المبلغ الكلى </label>
                                    <div class="col-lg-9">
                                         <input class="form-control" name="total_amount"  value="<?php echo $row['total_amount']?>" required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المدفوع</label>
                                    <div class="col-lg-9">
                                            <input class="form-control" name="paid" value="<?php echo $row['paid_up']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المتبقى </label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="residual" value="<?php echo $row['Residual']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">عدد الاقسااط</label>
                                    <div class="col-lg-9">
                                             <input class="form-control" name="num_install" value="<?php echo $row['num_installments']?>" type="number">                 
                                     </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">قيمة القسط </label>
                                    <div class="col-lg-9">
                                             <input class="form-control" name="install_value" value="<?php echo $row['installment_value']?>" type="number">                 
                                     </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">اسم الضامن</label>
                                    <div class="col-lg-9">
                                           <input class="form-control" name="guarantor_name" value="<?php echo $row['Guarantor_name']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">تليفون الضامن</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" name="guarantor_phone" value="<?php echo $row['Guarantor_phone']?>" type="number">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">عنوان الضامن</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="guarantor_address" value="<?php echo $row['Guarantor_address']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم بطاقة الضامن</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" name="guarantor_ssd" value="<?php echo $row['card_number_Guarantor']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">بداية القسط</label>
                                    <div class="col-lg-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $row['Installment_start']?>">
                                    <input class="form-control" type="date" name="start_date"  id="example-datetime-local-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                      
                                        <button class="btn btn-primary" name='edit'>تعديل</button>
                                    </div>
                                </div>
                            </form>
                            <a href="action.php?do=view&id=<?php echo $idd;?>"> <button class="btn btn-secondary btn-block" >الغاء</button></a>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
                    <?php   }else{
                                header('Location: index.php');
                            }
                        }
                    
                    elseif($_GET['do'] == 'view'){

           
                        if(isset($_GET['id'])){

                        $id=$_GET['id'];
                        $row = select('*','users' , "WHERE id = $id");
    
                    
                    
                    ?>
                  <input type="button" value="طباعه" class="btn btn-outline-primary" onclick="printDiv()">  

                      <div class="col-lg-12" id="print">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0 text-center"><?php echo $row['name']?></h3>
                        </div>
                        <div class="card-body col-md-8 offset-md-2">

                    <span class="anchor" id="formUserEdit"></span>

                  
                    <!-- form user info -->
                    <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">اسم العميل</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" disabled value="<?php echo $row['name']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">كود العميل</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="code" disabled value="<?php echo $row['Client_code']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label  form-control-label">عنوان العميل</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="client_address" disabled value="<?php echo $row['Client_address']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم التليفون</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="phone" disabled value="<?php echo $row['Client_phone']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم البطاقه</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="ssd" disabled value="<?php echo $row['card_number']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">نوع الدراجه</label>
                                    <div class="col-lg-9">
                                         <input class="form-control" name="bike" disabled value="<?php echo $row['bike_type']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> ثمن الشراء</label>
                                    <div class="col-lg-9">
                                         <input class="form-control" name="Purchase_price" disabled value="<?php echo $row['Purchase_price']?>"  required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المبلغ الكلى </label>
                                    <div class="col-lg-9">
                                         <input class="form-control" name="total_amount" disabled  value="<?php echo $row['total_amount']?>" required type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المدفوع</label>
                                    <div class="col-lg-9">
                                            <input class="form-control" name="paid"  disabled value="<?php echo $row['paid_up']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المتبقى </label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="residual" disabled value="<?php echo $row['Residual']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">عدد الاقسااط</label>
                                    <div class="col-lg-9">
                                             <input class="form-control" name="num_install" disabled value="<?php echo $row['num_installments']?>" type="number">                 
                                     </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">قيمة القسط </label>
                                    <div class="col-lg-9">
                                             <input class="form-control" name="install_value"  disabled value="<?php echo $row['installment_value']?>" type="number">                 
                                     </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">اسم الضامن</label>
                                    <div class="col-lg-9">
                                           <input class="form-control" name="guarantor_name" disabled value="<?php echo $row['Guarantor_name']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">تليفون الضامن</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" name="guarantor_phone" disabled value="<?php echo $row['Guarantor_phone']?>" type="number">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">عنوان الضامن</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="guarantor_address" disabled value="<?php echo $row['Guarantor_address']?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم بطاقة الضامن</label>
                                    <div class="col-lg-9">
                                    <input class="form-control" name="guarantor_ssd" disabled value="<?php echo $row['card_number_Guarantor']?>" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">بداية القسط</label>
                                    <div class="col-lg-9">
                                    <input type="text" class="form-control" disabled value="<?php echo $row['Installment_start']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                       <a href="index.php">  <a href="index.php"> <button class="btn btn-secondary" >الغاء</button></a></a>
                                       <a href="action.php?do=edit&id=<?php echo $row['id'];?>">  <button class="btn btn-primary">تعديل</button></a>
                                       <a href="action.php?do=details&id=<?php echo $row['id'];?>">  <button class="btn btn-primary">تفاصيل التقسيط</button></a>

                                    </div>
                                </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
                <?php
                    }else{
                        header("Location: index.php");
                    } 
            
            }elseif($_GET['do'] == 'paid'){


                    if(isset($_POST['ok'])){
                        
                        $ssd = $_POST['ssd'];
                        $date = $_POST['date'];
                        $paid = $_POST['paid'];
                        if(empty($date)){
                            echo "<div class ='alert alert-success container'>برجاء ادخال التاريخ</div>";
                            header("Refresh:3; url=action.php?do=paid");
                            exit();
                        }else{
                        $check = checkitem('card_number' , 'users',"WHERE card_number =$ssd ");
                        if($check < 1){

                                echo "<div class='container alert alert-danger'>لا يوجد رقم البطاقه هذا </div>";
                                header("Refresh:2; url=action.php?do=paid");
                                exit();
                        }else{

                            $row = select('id,Residual,paid_up,name','users' , "WHERE card_number =$ssd");
                            $id = $row['id']; 
                            $Residual = $row['Residual'];
                            $paid_up = $row['paid_up'];
                            $name = $row['name'];
                            if($Residual < $paid){
                                echo "<div class='container alert alert-danger'>عذرا المبلغ المدفوع اكبر من المتبقى </div>";
                                header("Refresh:2; url=action.php?do=paid");
                                exit();
                            }else{


                            $paid_up =  $paid_up + $paid ; 
                            $Residual = $Residual - $paid;

                            $stmt=$con->prepare("UPDATE users SET  Residual = ? , paid_up = ?   WHERE id = ?");
                             $stmt->execute(array( $Residual ,  $paid_up ,$id));
                                  

                            $stmt=$con->prepare("INSERT INTO months ( client_id ,client_name ,  Month_name , paid)  VALUES (:zclient_id ,:zclient_name ,  :zMonth_name,:zpaid)");
                                $stmt->execute(array(
                                    'zclient_id'   => $id,
                                    'zclient_name'   => $name,
                                    'zMonth_name' => $date,
                                    'zpaid'   =>  $paid,
                                   
                                    
                                ));
                                echo "<div class ='alert alert-success container'>تم اضافة القسط</div>";
                                header("Refresh:3; url=action.php?do=view&id=$id");
                                exit();
                         } 
                        }
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
                            <h3 class="mb-0">دفع اقساط</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form" role="form" autocomplete="off">
                              
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">رقم البطاقه</label>
                                    <div class="col-lg-9">
                                        <input class="form-control"  name="ssd" type="text" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">المبلغ</label>
                                    <div class="col-lg-9">
                                        <input class="form-control"  name="paid" step="any" type="number" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">التاريخ</label>
                                    <div class="col-lg-9">
                                        <input class="form-control"  name="date" type="date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                      
                                        <button class="btn btn-primary" name='ok'>دفع</button>
                                    </div>
                                </div>
                            </form>
                          <a href="index.php">  <input type="reset" class="btn btn-secondary btn-block" value="الغاء"></a>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>

           <?php 
           
        
        } elseif($_GET['do'] == 'details'){

                 if(isset($_GET['id'])){

                      $id=$_GET['id'];
                      $name = select('name','users',"where id = $id");
                      $rows=selectall('*' , 'months' , "WHERE client_id = $id ");

                      $x = select('client_id','months',"where client_id = $id");
                    
                    ?>
                  <input type="button" value="طباعه" class="btn btn-outline-primary" onclick="printDiv()">  

                    <div class="col-lg-12" id="print">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header text-center">
                            <h3 class="mb-0"> تفاصيل التقسيط</h3>
                            <h2 class="mb-0"><?php echo $name['name']?></h2>
                        </div>
                        <div class="card-body text-center">
                            <?php if(isset($x['client_id'])){
                            
                            ?>
                        <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">المدفوع</th>
                                            <th scope="col">التاريخ</th>
                                            
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                              $total = 0;
                                                foreach($rows as $row){
                                                 $total = $total + $row['paid'];
                                            ?>
                                        <tr>
                                           
                                            <td><?php echo $row['paid']?></td>
                                            <td><?php echo $row['Month_name']?></td>
                                            
                                        </tr>
                                                <?php }?>
                                                <tr>
                                           
                                         
                                           <td><?php echo  $total;?></td>
                                           <td>المجموع</td>
                                           
                                       </tr>
                                </table>
                                                <?php }else{
                                                 echo " لم يتم دفع اى قسط لهذا العميل";
                                                }?>
                                                <br><br>
                                                 <a href="index.php">  <button class="btn btn-primary">الصفحه الرئيسيه</button></a>
                                              <a href="action.php?do=paid">    <button class="btn btn-primary " >دفع قسط</button></a>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
            
                <?php 
        }else{
            header("location: index.php");
        }    
            
            } elseif($_GET['do'] == 'delete'){

                                if(isset($_GET['id'])){
                                    $IDD = $_GET['id'];
                                  

                                    $stmt=$con->prepare("DELETE FROM  users WHERE id = :zid");
                                    $stmt->bindparam('zid',$IDD);
                                    $stmt->execute();

                                   
                                    echo "<div class='container alert alert-success'>تم الحذف بنجاح </div>";
                                    header("Refresh:2; url=index.php");
                                    exit();
                                }else{
                                    header("Location: index.php");
                                }

                            }
                            
                        }else{
                            header("Location: index.php");
                        }
                            ?>
            </div><!-- .animated -->
        </div>

        
        <!-- /.content -->
        <?php
   
      include 'includes/footer.php';
                    }else{
                        header("Location: login.php");
                    }
    ?>

<script> 
        function printDiv() { 
            var divContents = document.getElementById("print").innerHTML; 
            var a = window.open('', '', 'height=2000, width=2000'); 
            a.document.write('<html><head>'); 
            a.document.write('<link rel="stylesheet" href="assets/css/style.css" type="text/css" />');
            a.document.write('</head><body > <br>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            a.print(); 
        } 
    </script>