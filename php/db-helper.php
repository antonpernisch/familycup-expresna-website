<?php
class DB {
    public $conn;

    function __construct( $server, $name, $user, $pass ) {
        $this->conn = mysqli_connect( $server, $user, $pass, $name );
        if ( !$this->conn ) {
            die( "FATAL: Nepodarilo sa pripojiť na databázu. Kontaktuje administrátora na t.č. 0918 829 445" );
            return false;
        }
        return true;
    }

    function FindExact( $table, $col, $data ) {
        if( mysqli_ping($this->conn) ) {
            mysqli_query( $this->conn, "SET NAMES utf8;" );
            $result = mysqli_query( $this->conn, "SELECT * FROM $table WHERE $col='$data'" );
            try {
                return mysqli_fetch_array( $result );
            } catch( Exception $e ) {
                echo "WARN: Pri načítavaní dát sa vyskytol problém:<br />$e";
                return false;
            }
        } else {
            die( "FATAL: Spojenie s databázou bolo stratené. Kontaktuje administrátora na t.č. 0918 829 445" );
            return false;
        }
    }

    function FindPartWithSel( $table, $colToSearch, $selectorCol, $partData, $selectorData ) {
        if( mysqli_ping($this->conn) ) {
            mysqli_query( $this->conn, "SET NAMES utf8;" );
            $result = mysqli_query( $this->conn, "SELECT * FROM $table WHERE $colToSearch LIKE '%" . $data . "%' AND $selectorCol='$selectorData' ORDER BY recordId LIMIT 1" );
            try {
                return mysqli_fetch_array( $result );
            } catch( Exception $e ) {
                echo "WARN: Pri načítavaní dát sa vyskytol problém:<br />$e";
                return false;
            }
        } else {
            die( "FATAL: Spojenie s databázou bolo stratené. Kontaktuje administrátora na t.č. 0918 829 445" );
            return false;
        }
    }

    function __destruct() {
        try {
            mysqli_close( $this->conn );
            return true;
        } catch(Exception $e) {
            return $e;
        }
    }
}