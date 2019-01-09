


<head>
<style>
    .tt{

        border: solid black 1px;
    }
    th{
        color:grey;
        background-color: black;
        width:10%;
        border:solid black 1px;
    }
    td{
        justify-content: center;
        text-align: center;
        width:10%;
        padding: 2%;
        border:solid black 2px;
        background-color: lightgray;
    }
    table{

        text-shadow: -1px -1px #eee, 1px 1px black, black;
        font-family:"Segoe print", Arial, Helvetica, sans-serif;
        color:black;

        font-weight:lighter;
        -moz-box-shadow: 2px 2px 6px #888;
        -webkit-box-shadow: 2px 2px 6px #888;
        box-shadow:2px 2px 6px #888;
        text-align:center;

        line-height:19px;
        margin-left: 25%;
    }
    h1{

        font-size: 24px;
        text-shadow: -1px -1px #eee, 1px 1px #888, -3px 0 4px #000;
        font-family:"Segoe print", Arial, Helvetica, sans-serif;
        color:#ccc;
        padding:16px;
        font-weight:lighter;
        -moz-box-shadow: 2px 2px 6px #888;
        -webkit-box-shadow: 2px 2px 6px #888;
        box-shadow:2px 2px 6px #888;
        text-align:center;
        margin-left: 38%;
        display:inline;
        width:50%;
        line-height:122px;
    }

</style>
</head>
<h1>ELEVES DE LA CLASSE</h1>

<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 04/12/2018
 * Time: 11:25
 */

// Premiere ligne
$servername = "localhost";
$username = "id7331201_steven";
$password = "";
$dbname = "id7331201_base";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}
else
{

    $conn->select_db($dbname);
}

function dede($table,$nom,$prenom,$age){
    global $conn;
    $sql=  "INSERT INTO $table VALUES (NULL,'$nom','$prenom','$age')";
    $conn->query($sql);

};

//dede('eleves','soudain','florance','33');
function affiche()
{
    global $conn;
    $sql = "SELECT *  from eleves";
    $result = $conn->query($sql);
    echo "<th>ID</th><th>Prenom</th><th>Nom</th><th>Age</th>";
    while ($row = $result->fetch_assoc()) {

        ?>

        <tr>
            <td class="tt"><?= $row['id']; ?></td>
            <td class="tt"><?= $row['prenom']; ?></td>
            <td class="tt"><?= $row['nom']; ?></td>
            <td class="tt"><?= $row['age'] . "ans"; ?></td>
        </tr>
        <?php
    }
}




function change($nom,$prenom,$age,$id)
{
global $conn;
    $sql = "UPDATE eleves set  nom='$nom',prenom='$prenom',age='$age' where id= $id";
    $conn->query($sql);
}

//change('flamant','brian','36','1');

function supr($id)
{
    global $conn;
    $sql = "DELETE from eleves where id=$id";
    $conn->query($sql);
}
//supr(10);





function ajoute($prenom,$nom,$age,$table){
    global $conn;
    $sql=  "INSERT INTO $table VALUES (NULL,'$nom','$prenom','$age')";
    $conn->query($sql);
}

/*
 *
 *  if(isset($_GET['nom'])
 *  {
 *  $nom = $_GET['nom'];
 *  }
 *
 */
$nom=(isset($_GET['nom']) ? $_GET['nom'] : null);


$prenom=(isset($_GET['prenom']) ? $_GET['prenom'] : null);
$age=(isset($_GET['age']) ? $_GET['age'] : null);



    ajoute($prenom, $nom, $age, 'eleves');



    function chang($nom,$prenom,$age,$id)
{
    global $conn;
    $sql = "UPDATE eleves set  nom='$nom',prenom='$prenom',age='$age' where id= '$id'";
    $conn->query($sql);
}
$id=(isset($_GET['idd']) ? $_GET['idd'] : null);
$nom2=(isset($_GET['nommod']) ? $_GET['nommod'] : null);
$age2=(isset($_GET['modage']) ? $_GET['modage'] : null);
$prenom2=(isset($_GET['modprenom']) ? $_GET['modprenom'] : null);


  chang($nom2, $prenom2, $age2, $id);





function sup($id)
{
    global $conn;
    $sql = "DELETE from eleves where id=$id";
    $conn->query($sql);
}
$sup=(isset($_GET['supid']) ? $_GET['supid'] : null);
if(isset($sup)) {
    sup($sup);
}

    echo"<table>";
     affiche();
     echo"</table>";

function dede2($table,$nom){
    global $conn;
    $sql=  "INSERT INTO $table VALUES (NULL,'$nom')";
    $conn->query($sql);

};
$mug=(isset($_GET['mug']) ? $_GET['mug'] : null);
dede2('mugs',$mug);
$id1=$_GET['id1'];
$id2=$_GET['id2'];
$associer="INSERT INTO eleves_mugs (id_eleve,id_mug)  VALUE  ($id1 , $id2)" ;
$conn->query($associer);

function affich($id1)
{
global $conn;
$sql = "SELECT eleves.prenom,mugs.description  from eleves,eleves_mugs,mugs WHERE eleves_mugs.id_eleve =$id1
and mugs.id =eleves_mugs.id_mug and eleves.id = $id1";
$result = $conn->query($sql);

echo "<th>Prenom</th><th>mugs</th>";
while ($row = $result->fetch_assoc()) {

?>

<tr>
    <td class="tt"><?= $row['prenom']; ?></td>
    <td class="tt"><?= $row['description']; ?></td>

</tr>
<?php
}
}
echo "<table>";
affich($id1);
echo "<table>";
/*
$associer="SELECT id.mugs . id.eleves 
FROM mugs JOIN eleves ON eleves.id = mugs.numero
WHERE mugs_eleves";


$conn->query($associer);*/
