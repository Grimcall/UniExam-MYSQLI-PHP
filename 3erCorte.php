<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href = "styles.css">
    <title>3er Corte</title>
</head>
<body>
    <h1>Base de Datos: Personas</h1>
    <h2>Dependientes</h2>

<table border="1">
    <!-- SONARLINT: Bug Menor: Las tablas deberían llevar descripciones. A lo mejor quite esto. 
    Aplicado a todas las tablas. --->
    <caption>Tabla de datos: DEPENDIENTES</caption>
    <!-- SONARLINT: Las etiquetas <table> deben estar definidas por <th> para
        las columnas o filas, dependiendo.
        Se categoriza como un bug medio. 
        Esto lo hice con todas las tablas. --->
    <tr>
        <th scope="col">Cédula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Sexo</th>
        <th scope="col">Fecha de Nacimiento</th>
        <th scope="col">Parentesco</th>
    </tr>


    <!--- TABLA DEPENDIENTE ---->
    <?php 
   

    #Declaro una variable $base para no repetir tanto.
    $base = "personas";
    
    #Antes, me lanzaba error porque supuestamente pedía contraseña. 
    #$link = mysqli_connect("localhost", "root", " ", $base);
    #                                           ^^^^^
    #Tienen que estar pegadas las tildes para que cuente como un vacío, así "".

    $link = mysqli_connect("localhost", "root", "", $base);

    
    /*Cambiado de "mysqli_select_db($link, "dependientes");"
    La anterior iteración estaba seleccionando una **base de datos** inexistente "dependientes", no la tabla.*/
    mysqli_select_db($link, $base);

    #SONARLINT: Definir una constante para no repetir código inecesario.
    #Categorizado como bug menor de tipo "limpieza".
    #Aplicado a los todas las siguientes.
    #Hay otro error de este tipo que no he podido solucionar en "<br/>No hay más datos. <br/>"
    $nameset = "SET NAMES 'utf8'";
    $tildes = $link->query($nameset);




    mysqli_query($link, "INSERT INTO dependiente VALUES ('78900456',	'Juanita',	'F',	'12-Abr-95',	'Hija')");
    mysqli_query($link, "INSERT INTO dependiente VALUES ('23423445',	'Hector',	'M',	'23-Dic-67',	'Cónyuge')");
    mysqli_query($link, "INSERT INTO dependiente VALUES ('71134534',	'María',	'F',	'05-Mar-60',	'Cónyuge')");
    mysqli_query($link, "INSERT INTO dependiente VALUES ('75556734',	'Jorge',	'M',	'14-Mar-96',	'Hijo')");
    mysqli_query($link, "INSERT INTO dependiente VALUES ('71134534',	'Gloria',	'F',	'27-Nov-97',	'Hija')");
    mysqli_query($link, "INSERT INTO dependiente VALUES ('75556734',	'Oscar',	'M',	'14-Mar-96',	'Hijo')");
    ?>
    <?php
    function mostrarDatos ($resultados) {
        if ($resultados !=NULL) {
        ?>
            <tr>
            <td><?php echo $resultados['Cedula']; ?></td>
            <td><?php echo $resultados['Nombre']; ?></td>
            <td><?php echo $resultados['Sexo']; ?></td>
            <td><?php echo $resultados['FechaNacimiento']; ?></td>
            <td><?php echo $resultados['Parentesco']; ?></td>
            </tr>
        <?php
        }else {echo "<br/>No hay más datos. <br/>";}
    }
    $result = mysqli_query($link, "SELECT DISTINCT * FROM dependiente");
    while ($fila = mysqli_fetch_array($result)){ mostrarDatos($fila); }
    mysqli_free_result($result); mysqli_close($link);
?>
</table>

<h2>Departamentos</h2>
<table border="1">
<caption>Tabla de datos: DEPARTAMENTOS</caption>
    <tr>
        <th scope="col">Código del Departamento</th>
        <th scope="col">Nombre</th>
        <th scope="col">Cédula del Jefe</th>
    </tr>

<!--- TABLA DEPARTAMENTOS ---->
    <?php 

    #Mismos cambios que en la sección de TABLA DEPENDIENTE.
    $link = mysqli_connect("localhost", "root", "", "personas");

    mysqli_select_db($link, $base);
    $tildes = $link->query($nameset);


    mysqli_query($link, "INSERT INTO departamento VALUES ('0',	'Gerencia',	'43890231')");
    mysqli_query($link, "INSERT INTO departamento VALUES ('1',	'Teleinformática',	'75556734')");
    mysqli_query($link, "INSERT INTO departamento VALUES ('2',	'Desarrollo',	'23423445')");
    mysqli_query($link, "INSERT INTO departamento VALUES ('3',	'Soporte Técnico',	'71134534')");
    ?>
    <?php
    function mostrarDato ($resultado) {
        if ($resultado !=NULL) {
        ?>
            <tr>
            <td><?php echo $resultado['Codigo']; ?></td>
            <td><?php echo $resultado['Nombre']; ?></td>
            <td><?php echo $resultado['Cedula']; ?></td>
            </tr>
        <?php
        }else {echo "<br/>No hay más datos. <br/>";}
    }
    $result = mysqli_query($link, "SELECT DISTINCT* FROM departamento");
    while ($fila = mysqli_fetch_array($result)){ mostrarDato($fila); }
    mysqli_free_result($result); mysqli_close($link);
?>
</table>

<!--- TABLA PROYECTOS ---->
<h2>Proyectos</h2>
<table border="1">
<caption>Tabla de datos: PROYECTOS</caption>
    <tr>
        <th scope="col">Número</th>
        <th scope="col">Nombre</th>
        <th scope="col">Lugar</th>
        <th scope="col">Código del Departamento</th>
    </tr>

    <?php 
    #Mismos cambios que en la tabla DEPENDIENTE, DEPARTAMENTOS
    $link = mysqli_connect("localhost", "root", "", "personas");

    mysqli_select_db($link, $base);
    $tildes = $link->query($nameset);


    mysqli_query($link, "INSERT INTO proyecto VALUES ('129001', 'Registro y Matrícula',	'Bloque 21',	'2')");
    mysqli_query($link, "INSERT INTO proyecto VALUES ('139001', 'Red Lan',	'Bloque 14',	'1')");
    mysqli_query($link, "INSERT INTO proyecto VALUES ('139002',	'Instalación nuevo Switche',	'Bloque 21',	'1')");
    mysqli_query($link, "INSERT INTO proyecto VALUES ('129002',	'Notas',	'Campus',	'2')");
    mysqli_query($link, "INSERT INTO proyecto VALUES ('129003',	'Paso de aplicativos FOXPRO A COBOL',	'Bloque 21',	'2')");
    mysqli_query($link, "INSERT INTO proyecto VALUES ('149001', 'Inventario de HW y SW',	'Minas', '3')");
    mysqli_query($link, "INSERT INTO proyecto VALUES ('149002',	'Licenciamiento',	'Campus',	'3')");
    mysqli_query($link, "INSERT INTO proyecto VALUES ('149003',	'Evaluación de equipos PCs',	'Bloque 18',	'3')");
    ?>
    <?php
    function mostrarDat ($resulta) {
        if ($resulta !=NULL) {
        ?>
            <tr>
            <td><?php echo $resulta['Numero']; ?></td>
            <td><?php echo $resulta['Nombre']; ?></td>
            <td><?php echo $resulta['Lugar']; ?></td>
            <td><?php echo $resulta['Codigo']; ?></td>
            </tr>
        <?php
        }else {echo "<br/>No hay más datos. <br/>";}
    }
    $result = mysqli_query($link, "SELECT DISTINCT * FROM proyecto");
    while ($fila = mysqli_fetch_array($result)){ mostrarDat($fila); }
    mysqli_free_result($result); mysqli_close($link);
?>
</table>

<!--- TABLA TRABAJADORES ---->
<h2>Trabajadores</h2>
<table border="1">
<caption>Tabla de datos: TRABAJADORES</caption>
    <tr>
        <th scope="col">Cédula</th>
        <th scope="col">Nombre</th>
        <th scope="col">Salario</th>
    </tr>

    <?php 
    #Mismos cambios que en todas las tablas anteriores.
    $link = mysqli_connect("localhost", "root", "", "personas");

    mysqli_select_db($link, $base);
    $tildes = $link->query($nameset);


    mysqli_query($link, "INSERT INTO trabajadores VALUES ('26696857',	'Katherine García',	'3000')");
    mysqli_query($link, "INSERT INTO trabajadores VALUES ('26671334',	'Diego Parra',	'2500')");
    mysqli_query($link, "INSERT INTO trabajadores VALUES ('26671842',	'José García',	'1200')");
    mysqli_query($link, "INSERT INTO trabajadores VALUES ('11104896',	'Zulma Silva',	'1200')");
    mysqli_query($link, "INSERT INTO trabajadores VALUES ('11104897',	'Ana Silva',	'2500')");
    mysqli_query($link, "INSERT INTO trabajadores VALUES ('26671333', 'Sadie Pulido', '3000')");
    mysqli_query($link, "INSERT INTO trabajadores VALUES ('26671444',	'Emily Pulido',	'3000')");
    mysqli_query($link, "INSERT INTO trabajadores VALUES ('26671555',	'Chanelle Pulido',	'3000')");
    ?>
    <?php
    function mostrarDa ($resul) {
        if ($resul !=NULL) {
        ?>
            <tr>
            <td><?php echo $resul['Cedula']; ?></td>
            <td><?php echo $resul['Nombre']; ?></td>
            <td><?php echo $resul['Salario']; ?></td>
            </tr>
        <?php
        }else {echo "<br/>No hay más datos. <br/>";}
    }
    $result = mysqli_query($link, "SELECT DISTINCT* FROM trabajadores");
    while ($fila = mysqli_fetch_array($result)){ mostrarDa($fila); }
    
    $Consulta1="SELECT DISTINCT Salario FROM trabajadores";
        if($Cons1=mysqli_query($link, $Consulta1)){
        $rowcount=mysqli_num_rows($Cons1);
        echo "Salarios Distintos: ".$rowcount."<br>";
    }

    $Consulta2="SELECT DISTINCT*FROM trabajadores";
        if($Cons2=mysqli_query($link,$Consulta2)){
        $rowcount2=mysqli_num_rows($Cons2);
        echo "Total de empleados: ".$rowcount2."<br>";
    }
        echo "<br>";
    mysqli_free_result($result); mysqli_close($link);
        ?>
</table>


</body>
</html>