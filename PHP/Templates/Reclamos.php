<?php
    include_once '../private/clases/formsDB.php';
    include_once '../private/clases/session.php';
    include_once '../private/clases/reclamosDB.php';
    
    //Obtiene las clases
    use BDD\Tables\Form;
    use userSession\Session;
    use BDD\Tables\Reclamos;
    
    // variables para tener las clases
    $form = new Form();
    $session = new Session();
    $reclamos = new Reclamos();

    $sessionID = array($session->userId); // se obtiene el id del usuario
    $datos = $form->getUserForm($sessionID); // se obtienen los datos del formulario que retorna la funcion
    
    $getDatos = $datos->fetchAll();

    $hayAnalisis = false;   

    if($datos->rowCount() != 0) {
?>
    <!--Header del reclamo-->
    <div class="accordionWrapper">
        <table class="tableHeader">
            <thead>
                <tr>
                    <th class="border h-spacing-sm">ID</th>
                    <th class="border h-spacing-sm">Fecha de ingreso</th>
                    <th class="border h-spacing-sm">DNI</th>
                    <th class="border h-spacing-sm">Fecha</th>
                    <th class="border h-spacing-sm">Conoce M+H?</th>
                    <th class="border h-spacing-large">Puntos positivos</th>
                    <th class="border h-spacing-large">Estado de la acreditación</th>
                    <th class="border h-spacing-sm">Acredita (SI / NO)</th>
                    <th class="h-spacing-l">Motivo de la acreditación</th>
                </tr>
            </thead>
        </table>
        <?php  foreach ($getDatos as $row) { ?>
            <!--Cuerpo cabezera del reclamo (vista resumida)-->
            <div class="accordionItem close">
                <button type="button" class="accordionHeading">
                    <table class="tableBody">
                        <tbody>
                            <tr>
                                <td class="spacing-sm"><?php echo $row['ID_Form'] ?></td>
                                <td class="spacing-sm"><?php echo $row['Fecha'] ?></td>
                                <td class="spacing-sm"><?php echo $row['N_Remito'] ?></td>
                                <td class="spacing-sm"><?php echo $row['Fecha_Remito'] ? $row['Fecha_Remito']: '-' ?></td>
                                <td class="spacing-sm"><?php echo $row['Descripción'] ?></td>
                                <td class="spacing-large"><?php echo $row['Motivo'] ?></td>
                                <?php 
                                $analisisData = $reclamos->getAnalisis($row['ID_Form']);
                                if($analisisData->rowCount() > 0){
                                    $analisis = $analisisData->fetch();
                                    $hayAnalisis = true;
                                ?>
                                    <td class="spacing-large"><?php echo $analisis['Estado'] ?> </td>
                                    <td class="spacing-sm"><?php echo $analisis['Acreditacion'] ?> </td>
                                    <td class="spacing-l">
                                        <p class="date-rec"><?php echo date('d/m/Y') ?></p>
                                        <?php echo $analisis['Motivo'] ?> 
                                    </td>
                                
                                <?php 
                                }else{ $hayAnalisis = false;?>
                                    <td class="spacing-large"> - </td>
                                    <td class="spacing-sm"> - </td>
                                    <td class="spacing-l"> 
                                        <p class="date-rec"><?php echo date('d/m/Y') ?></p>
                                        - 
                                    </td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </button>
                

                <!--Contenido del reclamo-->

                <div class="accordionContent">
                    <div>
                        <h2 class="tittle-content">Cliente</h2>
                        <p><b class="subtittle">Emisor:</b> <?php echo $session->userProv; ?></p>
                        <p><b class="subtittle">Fecha:</b> <?php echo $row['Fecha'] ?></p>
                        <p><b class="subtittle">Solicitante:</b> <?php echo $row['Email'] ?></p>
                        <p><b class="subtittle">DNI:</b> <?php echo $row['N_Remito'] ?></p>
                        <p><b class="subtittle">Escuela:</b> <?php echo $row['Reclamante/Cliente'] ?></p>
                        <p><b class="subtittle">Conoce M+H:</b> <?php echo $row['Descripción'] ?></p>
                        <p><b class="subtittle">Puntos +:</b> <?php echo $row['Motivo'] ?></p>
                        <p><b class="subtittle">Puntos -:</b> <?php echo $row['Costes_derivados'] ?></p>
                    </div>
                    <hr>
                    <?php if($hayAnalisis){ ?>
                    <div>
                        <h2 class="tittle-content">Analisis del form.</h2>
                        <p><b class="subtittle">Serie filtro:</b> <?php echo $analisis['Vehi_Dañado'] ?></p>
                        <p><b class="subtittle">Usado / Sin uso:</b> <?php echo $analisis['Usado'] ?></p>
                        <p class="res"><b class="subtittle">Resultado del analisis:</b> <?php echo $analisis['Resultado'] ?></p>
                        <p><b class="subtittle">Informe Adicional:</b> <a href="#"><?php echo $analisis['Adjunto'] ?></a></p>
                        <p><b class="subtittle">Acredita (SI / NO):</b> <?php echo $analisis['Acreditacion'] ?></p>
                        <p><b class="subtittle">Motivo de la acreditación:</b> <?php echo $analisis['Motivo'] ?></p>
                        <p><b class="subtittle">Estado de la acreditación:</b> <?php echo $analisis['Fecha'] ?> <?php echo $analisis['Estado'] ?></p>
                    </div>
                    <?php } else { $hayAnalisis = false;?>
                        <div class="col-center">
                            <p>Su formulario esta siendo evaluado</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php }?>
    </div>

    <script src="../../JS/Accordion.js"></script>

<?php } else { ?>

    <h1 class="msg-noRec">Aun no se han realizado encuestas en esta cuenta.</h1>

<?php } ?>