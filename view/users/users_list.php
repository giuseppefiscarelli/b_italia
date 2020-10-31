<?php
$orderDirClass = $orderDir;
$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';

?>


<div class="row">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <form id="searchForm" method="get" action="<?=$pageUrl?>">
              <input type="hidden" name="page" id="page" value="<?=$page?>" >
                <h4 class="form-header text-uppercase"  style="font-size: 12px;margin-bottom: 10px;">
                  <i class="fa fa-search"></i>
                   Ricerca
                </h4>
                <div class="form-group row">
                  <label for="search1" class="col-sm-6 col-form-label">Globale</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="search1" name="search1" value="<?=$search1?>" placeholder="Inserisci nome utente">
                  </div>
                </div>    


                <div class="form-group row">
                  <label for="recordsPerPage" class="col-sm-8 col-form-label">Record per Pagina</label>
                  <div class="col-sm-4">
                  <select class="form-control"  
                  name="recordsPerPage" 
                  id="recordsPerPage" 
                  onchange="document.forms.searchForm.submit()">
                        <option value="">Seleziona</option>
                        <?php foreach ($recordsPerPageOptions as $val){ ?>
                        
                        <option value="<?=$val?>" <?=$recordsPerPage ==$val?'selected':''?>><?=$val?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                
                <div class="form-footer" style="margin-top: 0px;">
                    <button type="button" onclick="location.href='<?=$pageUrl?>'" id="resetBtn" class="btn btn-danger"><i class="fa fa-trash"></i> Reset</button>
                    
                    <button type="submit" onclick="document.forms.searchForm.page.value=1" class="btn btn-success"><i class="fa fa-search"></i> Ricerca</button>
                </div> 
              </form>
            </div>
          </div>
        </div>
      </div>














<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Lista Utenti</h5>
            <button  class="btn btn-primary" style="margin-bottom: 10px;"
            data-toggle="modal" data-target="#myModal">
            <i class="fa fa-user-plus"></i> Aggiungi Utente</button>
            <small style="float: right;">Totale Utenti <b><?=$totalUsers?></b><br> Pagina <b><?=$page?></b> di <b><?=$numPages?></b></small>
            <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="<?=$orderBy === 'id'?$orderDirClass: '' ?> ">
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=id&orderDir=<?=$orderDir?>">id</a></th>
                                <th class="<?=$orderBy === 'username'?$orderDirClass: '' ?> " >
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=username&orderDir=<?=$orderDir?>">user</a></th>
                                <th class="<?=$orderBy === 'roletype'?$orderDirClass: '' ?> " >
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=roletype&orderDir=<?=$orderDir?>">roletype</a></th>
                                <th class="<?=$orderBy === 'email'?$orderDirClass: '' ?> " >
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=email&orderDir=<?=$orderDir?>">email</a></th>
                                <th class="<?=$orderBy === 'cognome'?$orderDirClass: '' ?> " >
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=cognome&orderDir=<?=$orderDir?>">nominativo</a></th>    
                                <th class="<?=$orderBy === 'ambiente'?$orderDirClass: '' ?> " >
                                    <a href="<?=$pageUrl?>?<?=$orderByQueryString ?>&orderBy=ambiente&orderDir=<?=$orderDir?>">ambiente</a></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($users){
                                    foreach ($users as $user){?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['roletype'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['cognome'] ?> <?=$user['nome']?></td>
                                <td>ambiente <?= $user['ambiente'] ?><br>azienda <?= $user['azienda'] ?><br>filiale <?= $user['filiale'] ?></td>
                                
                                <td style="padding-top: 0px;padding-bottom: 0px;">
                                    <div class="row">
                                        <div class="card-body">

                                            <div class="btn-group m-1" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Azioni
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a data-toggle="modal" data-target="#myModal" onclick="upUser(<?=$user['id']?>)"class="dropdown-item">
                                                        <i class="fa fa-pencil"></i> Modifica</a>
                                                    <a onclick="return confirm('Vuoi Eliminare il Record?')"
                                                    href="<?=$deleteUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$user['id']?>&action=delete" class="dropdown-item">
                                                        <i class="fa fa-trash"></i> Elimina</a>
                                                    
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php

                                    }
                                }else{
                                    
                                    echo '<tr><td colspan=2>NO Records Found</td></tr>';
                                }?>


                        </tbody>
                        
                        
                    

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
                            //require_once 'view/navigation.php';
                                ?>


<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Nuovo Utente
            </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <svg class="icon">
                  <use xlink:href="svg/sprite.svg#it-close"></use>
               </svg>
            </button>
         </div>
         <form id="personal-info" action="controller/updateUser.php" method="post">
         <div class="modal-body">
          

           
                <input type="hidden" name="id" value ="">
                <input type="hidden" name="action" value ="save">
                               
                <div class="form-group">
                    <input type="text" placeholder="username" value="" class="form-control" id="username" name="username" required>
                 
                  <label for="username" >Username</label>
                </div>

                <div class="form-group ">
                 
                  
                    <input type="password" placeholder="inserire nuova password" value="" class="form-control" id="password" name="password" >
                <label for="password" class="col-sm-3 col-form-label">Password</label> 
                </div>
 
                <div class="form-group">
            
                <div class="bootstrap-select-wrapper">
                    <label for="roletype" >Ruolo</label>
                    <select class="form-control" id="roletype" name="roletype" required>
                        <option value="">Seleziona</option>
                        <?php foreach ($roletype as $role){ ?>
                        
                        <option value="<?=$role?>" ><?=$role?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>

                <div class="form-group ">
                  
                 
                    <input type="text" placeholder="email" value="" class="form-control" id="email" name="email" required>
                    <label for="email" >Email</label>
                </div>

                <div class="form-group ">
                  <label for="cognome" >Cognome</label>
                  
                    <input type="text" placeholder="cognome" value="" class="form-control" id="cognome" name="cognome" required>
                  
                </div>

                <div class="form-group">
                  <label for="nome" >Nome</label>
                 
                    <input type="text" placeholder="nome" value="" class="form-control" id="nome" name="nome" required>
                  
                </div>

             

           
 



            
         </div>
         <div class="modal-footer">
            <button class="btn btn-primary btn-sm"  type="submit" form="personal-info">Salva Utente </button>
         </div>
         
         </form>
      </div>
   </div>
</div>


<script type="text/javascript">
  
      
      $(function(){

        function upUser(id){

            $('#personal-info').trigger('reset');
            
            $.ajax({
                url:'controller/updateUser.php?action=getUser',
                type:"POST",
                data: {id:id},
                dataType: 'json',
                success: function(json) {
                    
                    $.each(json, function(k,v) {
                        
                    });														
                }       
            });



        }




      })


</script>