<?php

	$con = mysql_connect("", "", "");
	mysql_select_db("");

	class mysqldb {

		public function query($arr) {
			if ($arr["action"] && $arr["table"]) {
				$q = "";

				$table = $arr["table"];

				switch ($arr["action"]) {
					case "select":
						$q .= "SELECT ".(isset($arr["row"])?$arr["row"]:"*")." FROM ".$table;
						break;
					case "insert":
						$q .= "INSERT INTO ".$arr["table"];
						if (isset($arr["values"]) && is_array($arr["values"])) {
							$isfirst = true;
							$x = "";
							$y = "";
							foreach ($arr["values"] as $m => $n) {
								if (!$isfirst) { $x .= ", "; $y .= ", "; }
								$x .= $m;
								$y .= "'".$n."'";
								$isfirst = false;
							}
							$q .= " (".$x.") VALUES (".$y.")";
						}
						break;
					case "update":
						$q .= "UPDATE ".$arr["table"];
						if ($arr["set"] && is_array($arr["set"])) {
							$q .= " SET ";
							$isfirst = true;
							$e = "";
							foreach ($arr["set"] as $k => $v) {
								if (!$isfirst) { $e .= ", "; }
								$e .= $k."='".$v."'";
								$isfirst = false;
							}
							$q .= $e;
						}
						break;
				}

				if ($arr["action"] != "insert") {
					if (isset($arr["limits"]) && is_array($arr["limits"])) {
						$isfirst = true;
						$q .= " WHERE ";
						$b = "";
						foreach ($arr["limits"] as $key => $value) {
							if (!$isfirst) { $b .= " AND "; }
							$b .= $key." = '".$value."'";
							$isfirst = false;
						}
						$q .= $b;
					}
				}

				if ($arr["action"] == "select" && isset($arr["sort_by"]) && is_array($arr["sort_by"])) {
					$q .= " ORDER BY ";
					$isfirst = true;
					foreach($arr["sort_by"] as $col => $ascDesc) {
						if (!$isfirst) { $q .= ","; }
						$q .= " ".$col." ".strtoupper($ascDesc);
						$isfirst = false;
					}
				}

				return mysql_query($q);

			}
		}

		public function rawQuery($query) {
			return mysql_query($query);
		}

	}

	function dbresult($q, $i, $r) { return dbrowexists($q) ? mysql_result($q, $i, $r) : false; }
	function dbfresult($q, $r) { return dbresult($q, 0, $r); }
	function dbnumrows($q) { return mysql_num_rows($q); }
	function dbrowexists($q) { return dbnumrows($q)>0 ? true : false; }

?>