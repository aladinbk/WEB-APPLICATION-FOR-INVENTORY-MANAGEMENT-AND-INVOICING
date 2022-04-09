<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->
<?php
include("check.php");
?>
<?php
include("header.php");

include("connect.php");
if(isset($_POST['btn']))
{
  $path ="image/";
  $image=basename($_FILES['image']['name']);
  $image_name=$path.$image;
  if(move_uploaded_file($_FILES['image']['tmp_name'],$image_name))
  {
    echo '<br>Upload Successfully';

  }else
  {
    echo '<br>Not Uploaded';
  }
}


if(isset($_POST['btn']))
{

  $pass=$_POST['password'];
  $sql="insert into users(name,username,password,user_level,image,status)values('".$_POST['name']."','".$_POST['username']."','".md5($pass)."','".$_POST['user_level']."','".$image."','".$_POST['status']."')";
//print_r($sql);exit;
  if($conn->query($sql)==TRUE)
  {
    echo"Record Inserted Sucessfully ";?>
    
    <script>window.location='users.php';</script>
  <?php
  }else
  {
    echo "Something Wrong" . $conn->error;
  }
 
}

?>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Ajouter un utilisateur</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Gestion des utilisateurs</a>
</li>
<li class="breadcrumb-item"><a href="">Ajouter un utilisateur</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">
<div class="card">
<div class="card-block">
	<form  method="POST" enctype="multipart/form-data">
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                           <h1>Ajouter un utilisateur</h1> 
                        </div>
                        
                    
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                          
                                        <form role="form">
                                            <div class="row">
                                                    <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nom :</label>
                                                    <input class="form-control"name="name" placeholder="Taper le nom d'un utilisateur" required >
                                                   </div> 
                                                </div>
                                                
                                                 <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Type User</label>
                                                    <input class="form-control"name="username" placeholder="ADMIN or USER" required>
                                                    </div>
                                                </div> 
                                             <div class="col-lg-6">
                                                    <div class="form-group">
                                                    <label>Mot de passe</label>
                                                    <input class="form-control"name="password" input type="password" placeholder="doit contenir min 8,Max 12 caractéres "  pattern=".{8,12}" maxlength="12" title="8 to 12 characters" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                <label for=" categories">Role</label>
													<select  name="user_level" required class="form-control" id="user_level">
														<?php
															$sql1 = ("SELECT * FROM user_groups where delete_status=0 ");
															$result1 =$conn->query($sql1);
     
															while ($row1 =$result1->fetch_assoc()){ ?>
															<option value="<?php echo $row1['id']; ?>"><?php echo $row1['group_name']; ?></option>";
															<?php   }                    
															?>
													</select>
												</div>
												</div>
												<div class="col-lg-6">
                                                    <div class="form-group">
                                                    <label>Photo d'utilisateur</label>
                                                    <input class="form-control"name="image" input type="file" placeholder=""   required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6" >
                                                <div class="form-group">
                                                    <label>Status d'un utilisateur</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status"  value="1" checked>Actif
                                                        </label>
                                                    </div>                                                        
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="status"  value="0">Passif
                                                        </label>
													</div>
                                                </div>
                                                </div> 
                                                 <div class="col-lg-12">
													<center>
													<div class="form-group">
														<button type="submit" class="btn btn-success" name="btn">Création</button>
													</center>
													</div>
												</div>
                                                           
                                            </div>
                                        </form> 
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
		</div>
	</form>
</div>
</div>
</div>
<?php include("footer.php"); ?>

<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->