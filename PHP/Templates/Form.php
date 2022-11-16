<?php 
  include_once '../private/clases/session.php';

  use userSession\Session;

  $session = new Session();
?>
    <!--FORM-->

    <div class="botones">
        <button class="btn" onclick="openModal();"><i class='bx bx-signal-5'></i><br>completar formulario en linea</button>
        <a href="../../Resources/files/formulario.pdf" download="formulario"><button class="btn"><i class='bx bx-download' ></i><br>descargar formulario(pdf)</button></a>
        <button class="btn" onclick="openPDF();"><i class='bx bx-upload' ></i><br>subir formulario(pdf)</button>
    </div>

    <div id="modal-fuera">
    <div class ="form desv">
        <form id="formRec" method="post" enctype="multipart/form-data">
            <p class="title">reclamación de garantía</p>
            <div class="text-group">
                <h3>Método</h3>
                <p>Formulario de reclamación y adjuntos a:<br>			
                MANN+HUMMEL Argentina S.A.<br>
                Departamento de Calidad<br>
                Senador Quindimil 4425<br>
                B1822APC Valenín Alsina, Lanús<br>
                Buenos Aires, Argentina<br>
                E-Mail: Quality-MHAR@mann-hummel.com
                <p class="parrafo"><b>Por favor, devuelvan sólo filtros de aceite 
                y combustible completamente vacíos.</b></p>
                </p>
            </div>
            <div class="row">
                <div class="col-display">
                    <div class="form-group">
                    <label for="emisor" >Emisor:</label><!--IMPORTANTE-->
                    <p><?php echo $session->userProv;?></p> <!--Se autocompleta con php-->
                    </div>  
                    <div class="form-group"> <!--Se autocompleta con php-->
                    <label class="L-F" for="fecha">Fecha:</label>
                    <p> <?php echo date('d/m/Y') ?> </p>
                    </div>
                </div>

                <div class="col-display">
                    <div class="form-group">
                    <label for="solicitante">Solicitante:</label>
                    <input type="text" name="solicitante" id="solicitante" class="input" placeholder="Nombre del solicitante" /><br>
                    </div>
                    <div class="form-group"><!--IMPORTANTE-->
                    <label for="remito">Núm. remito:</label>
                    <input type="text" name="remito" id="remito" class="input" placeholder="Ingrese número de remito" required/>
                    </div>
                </div><br>

                <div class="col-display">
                    <div class="form-group">
                    <label class="L-RC" for="cliente">Reclamante / Cliente:</label>
                    <input type="text" name="cliente" id="cliente" class="input" placeholder="Nombre del reclamante/cliente" />
                    </div>
                    <div class="form-group">
                    <label for="numCliente">Cantidad de filtros:</label>
                    <input type="number" name="numCliente" id="numCliente" value="1" min="1" class="input" placeholder="Ingrese Número" />
                    </div>
                </div><br>

                <div class="col-display">  
                    <div class="form-group"><!--IMPORTANTE-->   
                    <label for="descCliente">Descripción:</label>
                    <input type="text" name="descCliente" id="descCliente" class="input" placeholder="Describa el problema" required/>
                    </div>
                </div><br>
                
                <div class="col-display">
                    <div class="form-group"><!--IMPORTANTE-->
                    <label for="motivoRec">Motivo de la reclamación / descripción del defecto:</label>
                    <textarea name="motivoRec" id="motivoRec" class="input" cols="70" rows="10" placeholder="Por favor, proporcione una explicación detallada" required></textarea>
                    </div>
                    <div class="form-group"> <!--IMPORTANTE-->
                    <label for="costesRec">Costes derivados (montaje/desmontaje, daños de reparación, etc.):</label>
                    <textarea name="costesRec" id="costesRec" class="input" cols="70" rows="10" placeholder="Por favor, explíquelo con detalle y adjunte documentos (facturas, copias del presupuesto)" required></textarea>
                    </div>
                </div>

                <div>
                    <div class="form-group">
                    <label for="observacionesRec">Observaciones:</label>
                    <textarea name="observacionesRec" id="observacionesRec" class="input" cols="70" rows="10" placeholder="Escriba datos importantes del producto a tener en cuenta"></textarea>
                    </div>
                </div>

                <!--la sig info es necesaria si el filtro y esta instalada-->
                <div class="cont-filtInst" onclick="popUp();" >
                        <b><span id="checkjs"><i class="bx bxs-info-square"></i></span><div class="fopntext">filtro instalado?</div><br>PRESIONA CLICK PARA EXPANDIR/CONTRAER</b>
                </div><br>
                <div class="form-container-filtros desv">
                    <p class="parrafo"><b>Solo completar si el filtro ya está instalado en el vehiculo</b></p></br>
                
                    <div class="col-display-second">
                    <div class="form-group">
                        <label for="fechaCompra">Pieza comprada el:</label>
                        <input type="date" name="fechaCompra" id="fechaCompra" class="input" />
                        </div>
                        <div class="form-group">
                        <label for="fechaFiltro">Instalado el / A los KM:</label>
                        <input type="text" name="fechaFiltro" id="fechaFiltro" class="input" placeholder="Ingrese los datos de la instalación" />
                        </div>
                        <div class="form-group">
                        <label for="fechaFallo">El primer fallo ocurrió el / A los KM:</label>
                        <input type="text" name="fechaFallo" id="fechaFallo" class="input" placeholder="Ingrese los datos del fallo" />
                        </div>
                    </div><br>

                    <div class="col-display-second">
                        <div class="form-group">
                        <label for="fechaRetiro">Retirado el / A los KM:</label>
                        <input type="text" name="fechaRetiro" id="fechaRetiro" class="input" placeholder="Ingrese la fecha y los kms" />
                        </div>
                        <div class="form-group">
                        <label for="funcionamiento">Tiempo en funcionamiento en km:</label>
                        <input type="number" name="funcionamiento" id="funcionamiento" class="input" placeholder="Ingrese el tiempo en funcionamiento del filtro" required/>
                        </div>
                        <div class="form-group">
                        <label for="vehiculo">Vehículo:</label>
                        <input type="text" name="vehiculo" id="vehiculo" class="input" placeholder="Ingrese la marca y modelo del vehiculo" required/>
                        </div>
                    </div><br>

                    <div class="col-display-second">
                        <div class="form-group">
                        <label for="añoVehiculo">Año de matriculación:</label>
                        <input type="number" name="añoVehiculo" id="añoVehiculo" class="input" placeholder="Ingrese el año de la instalación del filtro" required/>
                        </div>
                        <div class="form-group">
                        <label for="motorDesc">Tipo de motor / (CM3):</label>
                        <input type="text" name="motorDesc" id="motorDesc" class="input" placeholder="Ingrese el tipo de motor que usa el vehiculo" required/>
                        </div>
                        <div class="form-group">
                        <label for="motorPotencia">Potencia:</label>
                        <input type="number" name="motorPotencia" id="motorPotencia" class="input" placeholder="kW / HP" />
                        </div>
                    </div><br>

                    <div class="col-display-second">
                        <div class="form-group">
                        <label for="vehiculoKms">Kilometraje:</label>
                        <input type="number" name="vehiculoKms" id="vehiculoKms" class="input" placeholder=" Km del motor" />
                        </div>
                        <div class="form-group">
                        <label for="chasisNum">Núm. chasis:</label>
                        <input type="text" name="chasisNum" id="chasisNum" class="input" placeholder="Del vehiculo" />
                        </div>
                        <div class="form-group">
                        <label for="matriculaNum">Núm. matricula:</label>
                        <input type="text" name="matriculaNum" id="matriculaNum" class="input" placeholder="Del vehiculo" />
                        </div> 
                    </div><br>
                </div>   
                <div class="adjuntos">
                    <label for="adjuntos"> Adjuntos y / o Archivos necesarios:</label>
                    <input type="file" name="adjuntos[]" id="adjuntos" class="input" multiple /><br>
                </div>
                <div class="container-btn-form">
                    <button type="button" class="btn-form btn-cancel" id="cancelar" onclick="cancelModal();">cancelar formulario</button>
                    <button type="button" class="btn-form btn-submit" id="enviar" onclick="checkForm();">enviar formulario</button>
                </div>
            </div>
        </form>
        <p class="parrafo2 bx bx-error">No se pueden procesar las reclamaciones que contienen información inadecuada. Todos los artículos presentados para la reclamación deben estar en el mismo estado 
        que expresa el contenido de la reclamación. Nuestras condiciones generales de venta y entrega son aplicables en todos los casos.</p>
        </div>  
    </div>
    </div>

    <!--Form para subir archivos-->
    <div id="PDF-fuera">
        <div class ="form formPDF desv" id="start1">
            <form id="formPDF" enctype="multipart/form-data" method="post">
                <p class="title">reclamación de garantía</p>
                <div class="row">
                    <label for="adjuntos">Formulario en formato PDF:</label>
                    <input type="file" name="PDF" class="input" required/><br>
    
                    <label for="adjuntos">Adjuntos/Archivos:</label>
                    <input type="file" name="adjuntos[]" class="input" multiple /><br>
                    <div class="container-btn-form">
                        <button type="button" class="btn-form btn-cancel" id="cancelar" onclick="cancelPDF();">cancelar formulario</button>
                        <button type="button" class="btn-form btn-submit" id="enviar" onclick="sendFormPDF();">enviar formulario</button>
                    </div>
                </div>
            </form>
            <p class="parrafo2 bx bx-error">No se pueden procesar las reclamaciones que contienen información inadecuada. Todos los artículos presentados para la reclamación deben estar en el mismo estado 
            que expresa el contenido de la reclamación. Nuestras condiciones generales de venta y entrega son aplicables en todos los casos.</p>
        </div>
    </div>
    </div>

    <!--Scripts-->
    <script src="../../JS/formReclamos.js"></script>
