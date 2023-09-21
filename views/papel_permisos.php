

  <div class="cont-permiso">
     <div class="hoja">
        <div class="div-fecha">
            <div class="fecha"></div>
        </div>
            <div>
                <label for="aprendiz-lista">Aprendiz:</label>
                    <select id="aprendiz-lista">
                        <option value="opcion1">Opción 1</option>
                        <option value="opcion2">Opción 2</option>
                        <option value="opcion3">Opción 3</option>
                    </select>
            </div>
        <div>
            <label for="instructor">Instructor:</label>
            <input type="text" id="instructor" value="Hector Mauricio Camargo" />
        </div>
        <div>
            <label for="titulada">Titulada:</label>
            <input type="text" id="titulada" value="Analisis y Desarrollo de software" />
        </div>
        <div class="div-ficha-ambiente">
                <div>
                    <label for="ficha">Ficha:</label>
                    <input type="text" id="ficha" value="2557736" />
                </div>
                <div>
                    <label for="ambiente">Ambiente:</label>
                    <input type="text" id="ambiente" value="E_105" />
                </div>
        </div>    
        <div class="div-hora">
            <label for="hora">Hora de salida:</label>
            <div id="hora" class="hora"></div>
            <button class="periodo" onclick="cambiaAMPM()">a.m</button>
        </div>
        <div class="div-motivo">
            <label for="motivo">Movitivo de la salida:</label>
            <textarea id="motivo" rows="4" cols="50"></textarea>
        </div>
    </div>
        <div class="resultado">
            <h1>Aqui se generara su permiso</h1>
        </div>

    <div class="div-botones">    
        <a href="#" class="btn_registro-aprendiz">
            <input type="image" src="../imagenes/registro-icon.svg" id="registro-aprendiz" alt="">
            <label for="registro-aprendiz">Registrar aprendiz</label>
        </a>
            <button class="btn-generar-permiso" onclick="generarPermiso()">Generar</button>
            <button class="btn-cancelar-permiso" onclick="cancelarPermiso()">Cancelar</button>
            <button class="btn-generar-permiso" onclick="cancelarPermiso()">Enviar</button>
    </div>

  </div>
 