<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>PHP ex 7.8 Formulaire: Client & Server</title>
    </head>
    <body >
        <?php
            /*  Avec le formulaire de l'exercice 5, Si des données sont passées en POST ou en GET, 
                le formulaire ne doit pas être affiché. 
                Par contre les données transmises doivent l'être. Dans le cas contraire, c'est l'inverse.  
            */
            if ( ((($_SERVER['REQUEST_METHOD']) === 'POST') || (($_SERVER['REQUEST_METHOD']) === 'GET')) && 
                 (!empty($_REQUEST['civil'])) && (!empty($_REQUEST['userName'])) && (!empty($_REQUEST['userFirstname'])) )
            {
                // Server part
                $scriptFileName=$_SERVER['PHP_SELF'];
                echo nl2br("Server part: script name '".$scriptFileName."'\n");
                $extension='.pdf';
                $expectecPosition= strpos($scriptFileName, $extension, strlen($scriptFileName)-strlen($extension));
                if ($expectecPosition === true)
                {
                    echo( " --> ".$extension." found");
                }
                else
                {
                    echo( " --> NO ".$extension." extension");
                }
                $civilInfo= $_REQUEST['civil'];
                $userName= $_REQUEST['userName'];
                $userFirstname= $_REQUEST['userFirstname'];
                echo nl2br("\nReceived parameters: ".$civilInfo." ".$userName." ".$userFirstname);
            }
            else
            {
            // Client part
        ?>
            <form action="index.php" method="get">
                <label>Client: </label>
                <select name="civil" id="civilId">
                    <option value="Mr">Mr</option>    			
                    <option value="Mme">Mme</option>   
                </select>
                <label for="userName">Nom: </label>
                <input type="string" name="userName" placeholder="nom">
                <label for="userFirstname">Prénom: </label>
                <input type="string" name="userFirstname" placeholder="prénom">            
                <input type="submit" value="OK">
            </form>       
        <?php
            }
        ?>
    </body>
</html>