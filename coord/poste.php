<?php
session_start();
include('../settings/dbconfig.php');
if (isset($_SESSION['coordFiliere'])) {?>
	


<!DOCTYPE html>
<html lang="en">
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


	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>
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
				
				<a href="index.html" class="logo">
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
						$sth =$db->prepare("SELECT * from notifications where Statut = 0 ");
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
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Acceuil</h2>
								<h5 class="text-white op-7 mb-2">Bienvenue dans la platforme de gestion de departement</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="form_candidature.php?id_election=<?php echo $_GET['id_election']?>&amp;date_fin_insc=<?php echo $_GET['date_fin_insc'] ?>&amp;date_debut_insc=<?php echo $_GET['date_debut_insc'] ?>" class="btn btn-white btn-border btn-round mr-2">Pré-candidature</a>
								<a href="lancerVote.php?id_election=<?php echo $_GET['id_election']?>&amp;date_election=<?php echo $_GET['date_election'] ?>" class="btn btn-secondary btn-round">Espace de Vote</a>
							</div>
						</div>
					</div>
				</div>
<div class="card">
								<div class="card-header">
									<div class="card-title">Postes ouverts</div>
									<?php
                                            $election=$_GET['id_election'];
                                            $date_election=$_GET['date_election'];
                                            $date_fin=$_GET['date_fin_insc'];
                                            $date_debut=$_GET['date_debut_insc'];
											 $coord=$_SESSION['coordFiliere']['id_prof'];
                                            $sql = "SELECT * from poste p
INNER JOIN election e on p.id_election=e.id_election

LEFT JOIN filiere f on f.id_filiere=p.id_filiere
LEFT JOIN departement d on d.id_dprtm=p.id_departement
WHERE
p.id_departement in
(SELECT d.id_dprtm FROM liste_modules lm INNER join filiere f on lm.id_filiere=f.id_filiere
INNER JOIN departement d on d.id_dprtm=f.id_departement 
where lm.prof_cours='$coord' or lm.prof_TD='$coord' or lm.prof_TD='$coord' group by d.id_dprtm) 
OR 
p.id_filiere in
(SELECT f.id_filiere FROM liste_modules lm INNER join filiere f on lm.id_filiere=f.id_filiere
INNER JOIN departement d on d.id_dprtm=f.id_departement 
where lm.prof_cours='$coord' or lm.prof_TD='$coord' or lm.prof_TD='$coord' group by f.id_filiere) 
AND STATUS='active' AND e.id_election='$election'
";
                                            $statement = $db->prepare($sql);
                                            $statement->execute();
                                            $poste = $statement->fetchAll(PDO::FETCH_OBJ);?>
											
											
								<span style="color:red;">*</span>	Si vous avez les conditions vous pouvez postuler sur une seul candidature :

								 <a href="form_candidature.php?id_election=<?php echo $election?>&amp;date_fin_insc=<?php echo $date_fin ?>&amp;date_debut_insc=<?php echo $date_debut ?>" class="btn btn-link" role="button"> 
											<span class="btn-label">
												<i class="fa fa-link"></i>
												</span>
										Pré-Candidature
										</a>	
								</div>
								<div class="table-responsive">
								<div class="card-body">

									<table id="basic-datatables" class="display table  table-hover border mb-3 " cellspacing="0" width="100%" >
										<thead >
                                            <tr style="background-color:#D7D9E7">
												<th scope="col">Poste</th>
												<th scope="col">Département/Filiere</th>
												<th scope="col">Maximum de vote</th>
												<th scope="col">Condition de candidature</th>
												<th scope="col">Desciption</th>
												<th scope="col">Information</th>												
											</tr>
										</thead>
										<tbody >
																						 <?php    
 if($poste){ foreach ($poste as $row) {?>
                                           
											<tr>
												<td><?php echo $row->nom_poste ?></td>
												
												<td> 
												    <p style="color:#033C8D ;font-weight: bold;"><?php echo $row->nom_dprtm ?></p>
													<p style="color:#109D12 ;font-weight: bold;"><?php echo $row->intitule_filiere ?></p>
												</td>
												<td><?php echo $row->max_vote ?></td>
												<td>
													<a tabindex="0" class="btn btn-light" role="button"  data-target="#voirCondition<?php echo $row->id_poste ?>"data-toggle="modal" title="" data-original-title="voir">
													<i class="fas fa-eye"></i>
												   </a>
												</td>
												<td>
									                <a tabindex="0" class="btn btn-light" role="button"  data-target="#voirDescription<?php echo $row->id_poste ?>"data-toggle="modal" title="" data-original-title="voir">
													<i class="fas fa-eye"></i>
												   </a>
												</td>
												<td>
												   <a href="candidats.php?id_poste=<?php echo $row->id_poste ?>&amp;id_election=<?php echo $election ?>&amp;date_election=<?php echo $date_election ?>" class="btn btn-primary btn-sm" role="button">
												   <i class="fas fa-user-tie">  candidats</i>
											    </a>
											</td>
											</tr>
											
<!-- Modal voir Condition-->
<div class="modal fade" id="voirDescription<?php echo $row->id_poste ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #9CC9F1;">
				<h5 class="modal-title" id="exampleModalLongTitle">Description de candidature</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" >

				<?php echo $row->condition_poste ?>
			</div>
			<div class="modal-footer" style="background-color: #9CC9F1;">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
				
			</div>
		</div>
	</div>
</div>
<!-- Modal voir description-->
<div class="modal fade" id="voirCondition<?php echo $row->id_poste ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		
		<div class="modal-content">
			<div class="modal-header" style="background-color: #9CC9F1;">
				<h5 class="modal-title" id="exampleModalLongTitle">Les conditions de candidature</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"  style="background-color: #9CC9F1;">
				<div class="card" style="width: 30rem;">
	
	<ul class="list-group list-group-flush" style="font-weight: bold;"  >
		<li class="list-group-item" >Type de l'enseignant : <?php echo '<h5>'.$row->condition_type_prof.'</h5>'; ?></li>
		<li class="list-group-item">Spécialité :&nbsp;&nbsp;   <?php echo '<h5>'.$row->condition_specialite.'</h5>'; ?></li>
		<li class="list-group-item">grade : &nbsp; &nbsp; <?php echo '<h5>'.$row->condition_grade.'</h5>'; ?></li>
		<li class="list-group-item">Anciennete :&nbsp; &nbsp;  <?php echo '<h5>'.$row->condition_anciennete.'</h5>'; ?></li>
	</ul>
</div>

				
			</div>
			
		</div>

	</div>
</div>



											<?php ;}}else {
                          echo '<div class = "container " style="color:red;">';
                            echo '<BR>';
                             echo ' <strong>';

                            echo ' <center>';

                            echo "Aucun candidature ouverts pour le moment !!";
                            echo '</center>';
                            echo ' </strong>';
                            echo '<BR>';
                            echo '</div>';
                        }
                                             
                       
                        ?> 
										</tbody>
									</table>
</div>
								</div>
							</div>	</div>
			
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

	<!-- jQuery Vector Maps -->
	<script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="../assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>
	<script src="../assets/js/demo.js"></script>
	<script>$('#basic-datatables').DataTable();</script>

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
</body>
</html>
<?php } 

else {
	$message="must login";
    header('location:../login/index.php?message='.urlencode($message));
}


?>