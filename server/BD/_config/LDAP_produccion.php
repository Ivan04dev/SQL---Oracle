<?php
	
	class LDAP{

		function validaLDAP($u,$p){

	        $adServer = "ldap://172.21.32.77";
	        $ldap     = ldap_connect($adServer);
	        $ldaprdn  = 'IZZITELECOM' . "\\" . $u;

	        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
	        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

	        $bind = @ldap_bind($ldap, $ldaprdn, $p);

	        $x = 0;

	        if($bind){

	            $filter = "(sAMAccountName=$u)";

	            $result = ldap_search($ldap,"DC=izzitelecom,DC=net",$filter);

	            #ldap_sort($ldap,$result,"sn");

	            $info = ldap_get_entries($ldap, $result);

	            $x = 1;
	            /*
	            for ($i=0; $i<$info["count"]; $i++){

	                $arraygpos =  $info[$i]["memberof"];

	                if($info['count'] > 1)

	                   break;
	                   echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] .", " . $info[$i]["memberof"][1] ."</strong><br/> (" . $info[$i]["samaccountname"][0] .")</p>\n";
	                   #echo '<pre>';
	                   #echo '</pre>';
	                   $userDn = $info[$i]["distinguishedname"][0];

	            }
	            $x = 1;
	            */
	            /*
	            foreach ($arraygpos as $key){

	                if($key == "CN=Grupo Tiendas CX,OU=Aplicaciones,OU=Grupos de Servicio,OU=Infraestructura,DC=izzitelecom,DC=net"){

	                   $x = 1;
	                   unset($key);
	                   break;

	                }else{

	                   $x = 2;

	                }
	            }
				*/

	            @ldap_close($ldap);

			}

			else{

				echo "Usuario o contraseña incorrectos";
				$x = 3;

			}

			return $x;

	    }

	}

?>