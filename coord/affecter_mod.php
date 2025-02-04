<?php
session_start();
include('../settings/dbconfig.php');
if (isset($_SESSION['coordFiliere'])) {?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Page PROFESSEUR</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<!-- Fonts and icons -->
	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/atlantis.min.css">
	<link rel="stylesheet" href="cssChat/styleC.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<style>
.blue-color {
color:blue;
}
.green-color {
color:green;
}
.teal-color {
color:teal;
}
.yellow-color {
color:yellow;
}
.red-color {
color:red;
}


.sidenavv {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.01), 0 6px 20px 0 rgba(0, 0, 0, 0.05);
}

.sidenavv a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenavv a:hover {
  color: #1fd116;
}

.sidenavv .closebtnv {
  position: absolute;
  top: 10;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenavv {padding-top: 15px;}
  .sidenavv a {font-size: 18px;}
}



	.modal.right .modal-content {
		height: 100%;
		overflow-y: auto;
	}
	
	.modal.right .modal-body {
		padding: 15px 15px 80px;
	}


.modal.right.fade .modal-dialog {
		right: -320px;
		-webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
		   -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
		     -o-transition: opacity 0.3s linear, right 0.3s ease-out;
		        transition: opacity 0.3s linear, right 0.3s ease-out;
	}
	.modal.right.fade.in .modal-dialog {
		right: 0;
	}

.modal-backdrop, 
.modal-backdrop.fade.in{
opacity: 1 !important;
filter: alpha(opacity=100) !important;
background: transparent;
}

</style>

	
</head>
<body>

<!-------------------------- First Modal ----------------------------------------------------------------------------------------------->

<div id="mySidenavv" class="sidenavv">
  <a href="javascript:void(0)" class="closebtnv" onclick="closeNavV()">&times;</a>

  <div class="wrapperr">
    <section class="users">
      <header>
        <div class="content">
           
           <!--------------- header espace de chat ---------------------------------->
 

           <?php 
          $sql = $db->prepare("SELECT * FROM professeur WHERE id_prof = {$_SESSION['coordFiliere']['id_prof']}");
          
          $sql->execute(); 
          
          
          $row = $sql->fetch(PDO::FETCH_ASSOC);
       
        ?>

    
          <img src="../images/<?php echo $_SESSION['professeur']['Image']?>" alt="">
          <div style="margin-top: 12px;" class="details">
            <span><?php echo $_SESSION['coordFiliere']['nomPrenom_prof'] ?></span>
            <ul>
            <i><p style="font-size: 14px; display: inline;"><?php echo $row['status']; ?> </p></i>
            <i style="display: inline; margin-left:5%; padding-top:0%; color:#31CE36; font-size: 10px;" id="status-dott" class="fas fa-circle"></i></ul>
          </div>

        </div>
      </header>

        <!--------------- barre de recherche - espace de chat ---------------------------------->

        <div class="search">
          <span style="font-size: 15px;" class="text">Sélectionnez un prof pour lancer la discussion</span>
          <input type="text" placeholder="Entrez le nom pour chercher...">
          <button><i class="fas fa-search"></i></button>
        </div>

        
        <!--------------- La lise des profs enligne et hors ligne ---------------------------------->

        <div class="users-list">
         
           <?php
   
              
           ?>

      </div>
    </section>
  </div>
</div>

<!---------------------------------------------- navbar & sidebar menu ------------------------------------------------------------------------->

	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="../index.html" class="logo">
				<img src="images/fac.png" style="width: 100%; height: 60%; background-color: white; border-radius: 5px;" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<!---------------------- icon chat ---------------------------------------------->
             
              <?php
						$sth = $db->prepare("SELECT * from messages where incoming_msg_id = {$_SESSION['coordFiliere']['id_prof']} and Status = 1 ");
						$sth->execute(); 
						$result = $sth->fetchAll();
						$count=$sth->rowCount();
						?>

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" onclick="openNavV()" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope" ></i>
								<?php
								if ($count>0) {?>
								<span class="notification"><?= $count?></span>
									<?php }
									
									?>
							</a>
						</li>

						<!---------------------- icon notification ---------------------------------------------->
						
						<?php
						$sth = $db->prepare("SELECT * from notifications where Statut = 0 ");
						$sth->execute(); 
						$result = $sth->fetchAll();
						$count=$sth->rowCount();
						?>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<?php
								if ($count>0) {?>
								<span class="notification"><?= $count?></span>
									<?php }
									
									?>
								
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">You have <?= $count?> new notification</div>
								</li>
								<li>
									<?php foreach ($result as $result) {?>
										<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">
											<a href="#">
												<img src="images/notif.png" style="width:40px; 
												height:40px; margin-top: 15px;" class="notif-icon notif-primary"></img>
												<div class="notif-content">
													<span class="block">
														<?= $result['Content']?>
													</span>
													<span class="time"><?= $result['DateCreation'] ?></span> 
												</div>
											</a>
										</div>
									</div>
										
									<?php } ?>
									
								</li>
								<li>
									
								</li>
							</ul>
							
						</li>
						
					
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
								<img src="../images/<?php echo $_SESSION['coordFiliere']['Image']?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											
											<div class="u-text">
												<h4><?= $_SESSION['coordFiliere']['nomPrenom_prof']?></h4>
												<p class="text-muted"><?= $_SESSION['coordFiliere']['email']?></p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<div class="user-box"><a style="font-size: 13px;" class="btn btn-xs btn-secondary btn-sm" href="profile_prof.php">
										     Mon Profile</a>
										</div>
											<div class="user-box"><a style="font-size: 13px;" class="btn btn-xs btn-secondary btn-sm" href="modifierMotDePasse.php">
										     Modifier Votre mot de passe</a>
										</div>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../login/logoutCoord.php">Déconnexion</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
						<img src="../images/<?php echo $_SESSION['coordFiliere']['Image']?>" alt="..." class="avatar-img rounded-circle">
							
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<h3><?php echo '<strong>'.$_SESSION['coordFiliere']['nomPrenom_prof'].'</strong>';?>
								</h3>
								<span class="user-level">Chef de filiere<i style="margin-left: 3%; color: #00d621; font-size: 13px;" class="fas fa-star"
									title="Coordinateur"></i></span>
							
								</span>
							</a>
							<div class="clearfix"></div>

							
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a  href="acceuil_coord.php">
								<i class="fas fa-home"></i>
								<p>Acceuil</p>
								<span class="caret"></span>
							</a>
							
						</li>

						<li class="nav-item">
							<a  href="Departements_prof.php">
								<i class="fas fa-layer-group"></i>
								<p style="font-weight: bold;">Département</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="modules_prof.php">
								<i class="fas fa-th-list"></i>
								<p style="font-weight: bold;">Modules</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="equipe_pedag_prof.php">
								<i class="fas fa-users"></i>
								<p style="font-weight: bold;">Equipe pédagogique</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="demandeFiliere.php">
								<i class="fas fa-plus-square"></i>
								<p style="font-weight: bold;">Accréditation d'une filière</p>
							</a>
						</li>
							<li class="nav-item">
							<a  href="brouillon.php">
							<i class="fa fa-trash"></i>
								<p>Brouillons</p>
							</a>
						</li>
						<li class="nav-item">
							<a  href="acceuil_vote.php">
								<img src="images/voteimg.jpg" alt="..." class="avatar-img rounded avatar avatar-xs" style="font-size:120px;color:white;">

								<p style="font-weight: bold;">&nbsp&nbsp&nbspEspace de vote</p>
							</a>
						</li>
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-cog"></i>
								<p style="font-weight: bold;">Gerer Filiere</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="filiere_coord.php">
										
											<span class="sub-item">filiere</span>
										</a>
									</li>
									<li>
										<a href="Gfil_listeModProf.php">
										
											<span class="sub-item">Modules</span>
										</a>
									</li>
									<li>
										<a href="module_prof.php">
											<span class="sub-item">Affecter Module</span>
										</a>
									</li>									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a >
                            <div class="digital-clock" style=" margin: auto;width: 200px;height: 60px;border: 2px solid #999;border-radius: 4px;text-align: center;font: 50px/60px 'DIGITAL', Helvetica;">00:00:00</div></a>
						</li>												
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Filiere </h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Gérer Filiere</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Filiere</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									
									<div class="card-title"><?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?></div>
									<div class="card-category"></div>
								</div>
								<div class="card-body">
									<table class="table table-typo">
										<tbody>
                 <?php 
                       $filiere=$_GET['id_filiere'];
                       $coord=$_SESSION['coordFiliere']['id_prof'];
                       $sql = "SELECT * FROM filiere f inner join professeur p on p.id_prof=f.coorFiliere 
                            INNER JOIN departement d on d.id_dprtm=f.id_departement
                           INNER JOIN cycle c on c.id_cycle=f.id_cycle
                           WHERE f.coorFiliere='$coord' and f.id_filiere='$filiere'
                          ";

                        $statement = $db->prepare($sql);
                        $statement->execute();
                        $fils = $statement->fetchAll(PDO::FETCH_OBJ);
                       
						foreach ($fils as $row) {
											
											echo '<tr>';
												echo
												"<td>	<strong>Filière</strong>   <h4>$row->intitule_filiere</h4>	</td>												
												<td>	<strong>département</strong>   <h4>$row->nom_dprtm</h4>    </td>

												<td>    <strong>Cycle </strong>      <h4>$row->nom_cycle</h4>        </td>";
												
											
											?>
												
											

												
											
											
									</tbody>
									</table>
  <div class="accordion accordion-secondary">
<div class="card">
		 <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne<?php echo $row->objectifs ?>" aria-expanded="true" aria-controls="collapseOne" style="background-color:#A6D0FA">
			<div class="span-icon">
				<div class="flaticon-box-1"></div>
			</div>
			<div class="span-title">
				OBJECTIFS
			</div>
			<div class="span-mode"></div>
		</div>

		<div id="collapseOne<?php echo $row->objectifs?>" class="collapse show  rounded" aria-labelledby="headingOne" data-parent="#accordion">
			<div class="card-body"  style="background-color:#F8FBFC "> <?php echo $row->objectifs ;?>
			 <div class="right"><br><br>
			 	<center>
			 	        <a href="" class="badge badge-primary"data-toggle="modal" data-target="#modifierObjectifs <?php echo $row->id_filiere ?>">Modifier</a> 
			 	        <a href="modifier_info_filiere/delete_objectifs.php?id_filiere=<?php echo $row->id_filiere?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer ce champs ?');"
			 	        	class="badge badge-danger">Supprimer</a>
			 	</center>
			 </div>
		   </div>
		</div>

	</div>
<div class="card" >
		<div class="card-header collapsed" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo<?php echo $row->competences?>" aria-expanded="false" aria-controls="collapseTwo" style="background-color:#A6D0FA">
			<div class="span-icon">
				<div class="flaticon-box-1"></div>
			</div>
			<div class="span-title">
				COMPETENCES
			</div>
			<div class="span-mode"></div>
		</div>
		<div id="collapseTwo<?php echo $row->competences?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
			<div class="card-body" style="background-color:#F8FBFC "> <?php echo $row->competences ;?>
			<div class="right"><br><br>
			 	<center>
			 	        <a href="" class="badge badge-primary"data-toggle="modal" data-target="#modifierCompetences<?php echo $row->id_filiere ;?>">Modifier</a> 
			 	        <a href="modifier_info_filiere/delete_competences.php?id_filiere=<?php echo $row->id_filiere?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer ce champs ?');"
			 	        	class="badge badge-danger">Supprimer</a>
			 	</center>
			 </div>	
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree<?php echo $row->debouches ?>" aria-expanded="false" aria-controls="collapseThree" style="background-color:#A6D0FA">
			<div class="span-icon">
				<div class="flaticon-box-1"></div>
			</div>
			<div class="span-title">
				DEBOUCHES
			</div>
			<div class="span-mode"></div>
		</div>
		<div id="collapseThree<?php echo $row->debouches ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="background-color:#D5D8DC">
			<div class="card-body"  style="background-color:#F8FBFC "> <?php echo $row->debouches ;?>
				<div class="right"><br><br>
			 	<center>
			 	        <a href="" class="badge badge-primary"data-toggle="modal" data-target="#modifierDebouches<?php echo $row->id_filiere ;?>">Modifier</a> 
			 	       <a href="modifier_info_filiere/delete_debouches.php?id_filiere=<?php echo $row->id_filiere?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer ce champs ?');"
			 	        	class="badge badge-danger">Supprimer</a>
			 	</center>
			 </div>
				
				</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapsefor<?php echo $row->conditions_acces ?>" aria-expanded="false" aria-controls="collapseThree" style="background-color:#A6D0FA">
			<div class="span-icon">
				<div class="flaticon-box-1"></div>
			</div>
			<div class="span-title">
				CONDITION D'ACCES
			</div>
			<div class="span-mode"></div>
		</div>
		<div id="collapsefor<?php echo $row->conditions_acces ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
			<div class="card-body"  style="background-color:#F8FBFC "><?php echo $row->conditions_acces ;?>
				<div class="right"><br><br>
			 	<center>
			 	        <a href="" class="badge badge-primary"data-toggle="modal" data-target="#modifierConditionDacc<?php echo $row->id_filiere ;?>">Modifier</a> 
			 	        <a href="modifier_info_filiere/delete_condition_acces.php?id_filiere=<?php echo $row->id_filiere?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer ce champs ?');"
			 	        	class="badge badge-danger">Supprimer</a>
			 	</center>
			 </div>
				
				</div>
		</div>
	</div>
<div class="card">
		<div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapsefive<?php echo $row->partenariats_cooperation ?>" aria-expanded="false" aria-controls="collapseThree" style="background-color:#A6D0FA">
			<div class="span-icon">
				<div class="flaticon-box-1"></div>
			</div>
			<div class="span-title">
				PARTENARIATS
			</div>
			<div class="span-mode"></div>
		</div>
		<div id="collapsefive<?php echo $row->partenariats_cooperation ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
			<div class="card-body"  style="background-color:#F8FBFC "><?php echo $row->partenariats_cooperation ;?>
				<div class="right"><br><br>
			 	<center>
			 	        <a href="" class="badge badge-primary"data-toggle="modal" data-target="#modifierPartenariat<?php echo $row->id_filiere ;?>">Modifier</a> 
			 	       <a href="modifier_info_filiere/delete_partenariats.php?id_filiere=<?php echo $row->id_filiere?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer ce champs ?');"
			 	        	class="badge badge-danger">Supprimer</a>
			 	</center>
			 </div>
				
				</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapsesixe<?php echo $row->pfe ?>" aria-expanded="false" aria-controls="collapseThree" style="background-color:#A6D0FA">
			<div class="span-icon">
				<div class="flaticon-box-1"></div>
			</div>
			<div class="span-title">
				PFE
			</div>
			<div class="span-mode"></div>
		</div>
		<div id="collapsesixe<?php echo $row->pfe ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
			<div class="card-body"  style="background-color:#F8FBFC "> <?php echo $row->pfe;?>
				<div class="right"><br><br>
			 	<center>
			 	        <a href="" class="badge badge-primary"data-toggle="modal" data-target="#modifierPFE<?php echo $row->id_filiere ;?>">Modifier</a> 
			 	       <a href="modifier_info_filiere/delete_pfe.php?id_filiere=<?php echo $row->id_filiere?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer ce champs ?');"
			 	        	class="badge badge-danger">Supprimer</a>
			 	</center>
			 </div>
				
				</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseseven<?php echo $row->stage?>" aria-expanded="false" aria-controls="collapseThree" style="background-color:#A6D0FA">
			<div class="span-icon">
				<div class="flaticon-box-1"></div>
			</div>
			<div class="span-title">
				STAGE
			</div>
			<div class="span-mode"></div>
		</div>
		<div id="collapseseven<?php echo $row->stage ?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
			<div class="card-body"  style="background-color:#F8FBFC "><?php echo $row->stage; ?>
				<div class="right"><br><br>
			 	<center>
			 	        <a href="" class="badge badge-primary"data-toggle="modal" 
			 	        data-target="#modifierSTAGE <?php echo $row->id_filiere ;?>">Modifier</a> 
			 	     <a href="modifier_info_filiere/delete_stage.php?id_filiere=<?php echo $row->id_filiere?>" 
			 	        	 onclick="return confirm('êtes-vous sûr de vouloir supprimer ce champs ?');"
			 	        	class="badge badge-danger">Supprimer</a>
			 	</center>
			 </div>
		    </div>
		</div>
	</div>
<!-- Modal Modifier Objectifs-->

	 <form method="POST" action="modifier_info_filiere/update_objectifs.php">
<div class="modal fade" id="modifierObjectifs <?php echo $row->id_filiere?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modifier les objectifs du filiere <?php echo $row->intitule_filiere ;?> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			 
			<div class="modal-body">
				
				<div class="form-group ">
					<input type="hidden" name="id_filiere" value="<?php echo $row->id_filiere ;?>">
			            <label>Objectifs</label>
                        <textarea name="objectifs" class="form-control" rows="15" ><?php echo $row->objectifs ;?></textarea>
                </div>
              
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				<button type="submit" name="update_objectifs" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			</div>
			
		</div>
	
	</div>
</div>
</form>

<!-- Modal Modifier Debouches-->
<form method="POST" action="modifier_info_filiere/update_stage.php">
<div class="modal fade" id="modifierDebouches<?php echo $row->id_filiere ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modifier Débouches du filiere <?php echo $row->intitule_filiere ;?> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			 
			<div class="modal-body">
				
				<div class="form-group ">
				<input type="hidden" name="id_filiere" value="<?php echo $row->id_filiere ;?>">
            
			            <label>Debouches</label>
                        <textarea name="debouches" class="form-control" rows="15" ><?php echo $row->debouches ;?></textarea>
                </div>
              
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				<button type="submit" name="update_debouches" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			</div>
		</div>
	</div>
</div>
</form>
<!-- Modal Modifier Condition d'accees-->
<form method="POST" action="modifier_info_filiere/update_condition_acces.php">
<div class="modal fade" id="modifierConditionDacc<?php echo $row->id_filiere ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modifier les conditions d'accées du filiere <?php echo $row->intitule_filiere ;?> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		  
			<div class="modal-body">
				
				<div class="form-group ">
			<input type="hidden" name="id_filiere" value="<?php echo $row->id_filiere ;?>">

			            <label>Conditions d'accées</label>
                        <textarea name="conditions_acces" class="form-control" rows="15" ><?php echo $row->conditions_acces ;?></textarea>
                </div>
              
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				<button type="submit" name="update_condition_acces" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			</div>

		</div>
	</div>
</div>
</form>
<!-- Modal Modifier competences-->
<form method="POST" action="modifier_info_filiere/update_competences.php">
<div class="modal fade" id="modifierCompetences<?php echo $row->id_filiere ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modifier les compétence pour filiere <?php echo $row->intitule_filiere ;?> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div> 
			<div class="modal-body">
				
				<div class="form-group ">
										<input type="hidden" name="id_filiere" value="<?php echo $row->id_filiere ;?>">

			            <label>Compétences</label>
                        <textarea name="competences" class="form-control" rows="15" ><?php echo $row->competences;?></textarea>
                </div>
              
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				<button type="submit" name="update_competences" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			</div>
		</div>
	</div>
</div>
</form>
<!-- Modal Modifier PArtenariats-->
<form method="POST" action="modifier_info_filiere/update_partenariats.php">
<div class="modal fade" id="modifierPartenariat<?php echo $row->id_filiere ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modifier les objectifs du filiere <?php echo $row->intitule_filiere ;?> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div> 
			<div class="modal-body">
				
				<div class="form-group ">
							<input type="hidden" name="id_filiere" value="<?php echo $row->id_filiere ;?>">

			            <label>Objectifs</label>
                        <textarea name="partenariats_cooperation" class="form-control" rows="15" ><?php echo $row->partenariats_cooperation ;?></textarea>
                </div>
              
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				<button type="submit" name="update_partenariats" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			</div>
		</div>
	</div>
</div>
</form>
<!-- Modal Modifier PFE-->
<form method="POST" action="modifier_info_filiere/update_pfe.php">
<div class="modal fade" id="modifierPFE<?php echo $row->id_filiere ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modifier les objectifs de PFE du filiere <?php echo $row->intitule_filiere ;?> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<div class="form-group ">
							<input type="hidden" name="id_filiere" value="<?php echo $row->id_filiere ;?>">

			            <label>PFE</label>
                        <textarea name="pfe" class="form-control" rows="15" ><?php echo $row->pfe ;?></textarea>
                </div>
              
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				<button type="submit" name="update_pfe" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			</div>
			 		</div>
	</div>
</div>
</form>
<!-- Modal Modifier Stage-->
<form method="POST" action="modifier_info_filiere/update_stage.php">
<div class="modal fade" id="modifierSTAGE <?php echo $row->id_filiere ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modifier les objectifs de stage du filiere <?php echo $row->intitule_filiere ;?> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
 
			<div class="modal-body">
				
				<div class="form-group">
							<input type="hidden" name="id_filiere" value="<?php echo $row->id_filiere ;?>">
			
			            <label>STAGE</label>
                        <textarea name="stage" class="form-control" rows="15" ><?php echo $row->stage ;?></textarea>
                </div>
              
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">annuler</button>
				<button type="submit" name="update_stage" class="btn btn-primary btn-sm">Enregistrer les modification</button>
			</div>

		</div>
	</div>
</div>
</form>









	<?php?>
	<?php 
                      
                       $coord=$_SESSION['coordFiliere']['id_prof'];
                       $sql = "SELECT m.intitule_module as mods,lm.semestre as semestre ,m.id_module as id_mod,f.id_filiere as id_fi,intitule_filiere as fil ,eq.intitule_equipe as equipe FROM liste_modules lm INNER join module m on m.id_module=lm.id_module INNER JOIN filiere f on f.id_filiere=lm.id_filiere INNER JOIN professeur p on p.id_prof=f.coorFiliere INNER JOIN equipe_pedagogique eq on eq.id_equipe=m.equipe_pedagogique WHERE f.coorFiliere='$coord' group by lm.semestre";

                        $statement = $db->prepare($sql);
                        $statement->execute();
                        $sem = $statement->fetchAll(PDO::FETCH_OBJ);?>
	<div class="card">
		<div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collaps9" aria-expanded="false" aria-controls="collapseThree" style="background-color:#A6D0FA">
			<div class="span-icon">
				<div class="flaticon-box-1"></div>
			</div>
			<div class="span-title">
				Module de formation
			</div>
			<div class="span-mode"></div>
		</div>
		<div  id="collaps9" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="background-color:#F8FBFC " >
			<div class="card-body"  >
				<p >
	                
                   <?php
                       
								foreach ($sem as $result) {?>
                 
                


	                <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $result->semestre?>" aria-expanded="false" aria-controls="collapseExample">
		               <?php echo $result->semestre ;?>
	                 <?php echo '</button>';?>
	                
                </p>
                    <div class="collapse" id="collapseExample<?php echo $result->semestre?>">

	                    <div class="card card-body" >
		                    <div class="card">
								
									<div class="card-title"><?php echo $result->semestre?> </div>
								
								<div class="card-body"  style="background-color:#FDFEFE  ;">
									<table class="table table-hover">
										<thead>
											<tr>
												<th scope="col">id_module</th>
												<th scope="col">intitule module</th>
												
												
											</tr>
										</thead>

										<tbody>
											
											
											<tr>
												<?php 
                      
                       $coord=$_SESSION['coordFiliere']['id_prof'];
                       $sql = "SELECT lm.id_module as idmod ,m.intitule_module as modul FROM liste_modules lm INNER JOIN module m on m.id_module=lm.id_module INNER JOIN filiere f on f.id_filiere=lm.id_filiere
                        where lm.semestre='$result->semestre' AND f.coorFiliere='$coord'";

                        $statement = $db->prepare($sql);
                        $statement->execute();
                        $mod = $statement->fetchAll(PDO::FETCH_OBJ);
                       
								foreach ($mod as $modules) {?>
												<td><?php echo $modules->idmod; ?></td>
												<td><?php echo $modules->modul; ?></td>
												
												
											</tr>
											<?php ;}?>
										</tbody>
									</table>
								</div>
							</div>
	                    </div>
                   </div><?php ;}?>
				</div>
			</div>
	   </div>
	   </div>
	   
	   </div><?php
}
	?>
		
    </div>



								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		
		<!-- End Custom template -->
	</div>

	<!------------------------------------------- second modal of chat ------------------------------------------------->

	<div style=" height: 600px !important;" class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div style="margin-left: 40%; margin-top : 4.85%; margin-bottom: 0px !important;" class="modal-dialog" role="document">
			<div style="background-color: transparent;" class="modal-content">


	<div  class="wrapperr1">
    <section sty class="chat-area">
      <header>


        <?php 
          $user_id =  $_GET['id_prof'];
          $sql = $db->prepare("SELECT * FROM professeur WHERE id_prof = {$user_id}");
          
          if($user_id){
          $sql->execute(); 
         }
          
          $count=$sql->rowCount();

          if($count > 0){
            $row = $sql->fetch(PDO::FETCH_ASSOC);
          }else{
            // header("location: users.php");
          }
        ?>


        <a href="" style="float: left; color: #2BB930;"  class="back-icon" onclick="back()"  id="href"><i class="fas fa-arrow-left"></i></a>
        
              		<!-- <button style="float: right;" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->

      </header>
      <div class="chat-box">

      </div>
      
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->


<!----------------------------------------------------------------------------------------------------------------------->


	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="../assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="../assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

  <!---------------------------------------------------------------->

 <script>
        $(document).ready(function() {

            // get the current URL

            // if the URL ends with the anchor #portfolioModal93 then we want to open the modal
            if(window.location.href.indexOf('#myModal2') != -1) {
                $('#myModal2').modal('show');
            }
        });
    </script>

     <script>
        function back() {

            if(window.location.href.indexOf('acceuil_coord') != -1) {
                $('#href').href('acceuil_coord.php');
        };

        
    </script>


<!---------------------------------------------------------------->


	<script type="text/javascript">
		const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "chat/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "chat/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);


	</script>

<!---------------------------------------------------------------->

<script>
function openNavV() {
  document.getElementById("mySidenavv").style.width = "450px";
}

function closeNavV() {
  document.getElementById("mySidenavv").style.width = "0";
}
</script>



<script>
function openNavVx() {
  document.getElementById("mySidenavvx").style.width = "450px";
}

function closeNavVx() {
  document.getElementById("mySidenavvx").style.width = "0";
}
</script>


<!------------------------------------------------------------->


<!---------------------------------------------------------------->

<script type="text/javascript">
    
   
   const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  

  </script>


<!------------------------------------------------------------->



	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
	<script>
$(document).ready( function () {
    $('#myTable').DataTable();
	$(document).ready(function() {
  clockUpdate();
  setInterval(clockUpdate, 1000);
})

function clockUpdate() {
  var date = new Date();
  
  function addZero(x) {
    if (x < 10) {
      return x = '0' + x;
    } else {
      return x;
    }
  }

  function twelveHour(x) {
    if (x > 12) {
      return x = x - 12;
    } else if (x == 0) {
      return x = 12;
    } else {
      return x;
    }
  }

  var h = addZero(twelveHour(date.getHours()));
  var m = addZero(date.getMinutes());
  var s = addZero(date.getSeconds());

  $('.digital-clock').text(h + ':' + m + ':' + s)
}
} );
</script>
</body>
</html>
<?php } 
else {
	$message="must login";
    header('location:../login/index.php?message='.urlencode($message));
}


?>