<table class="listado">
    <thead>
    <tr>
        <th><p>PADRON</p><p><input type="text" id="input_padron" onkeyup="filtrar_alumnos()"></p></th>
        <th><p>NOMBRE</p><p><input type="text" id="input_nombre" onkeyup="filtrar_alumnos()"></p></th>
        <th><p>APELLIDO</p><p><input type="text" id="input_apellido" onkeyup="filtrar_alumnos()"></p></th>
        <th><p>DNI</p><p><input type="text" id="input_dni" onkeyup="filtrar_alumnos()"></p></th>

        <th>
            <p>PAIS</p>
            <p>
                <select name = "id_nac" id="input_pais">
                    <option value="-1" selected>SIN FILTRAR</option>
                    <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
                        <option value="<?php echo $fila['id_nac'] ?>"><?php echo $fila['nacionalidad']?></option>
                    <?php } ?>

                </select>
            </p>
        </th>

        <th><p>MODIFICAR</p></th>
        <th><p>ELIMINAR</p></th>
    </tr>
    </thead>
    <tbody id="cuerpo_listado">

    </tbody>
</table>