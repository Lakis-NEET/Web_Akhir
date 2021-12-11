<?php
    function insert_data($koneksi,$nama_tabel,$data){
        $col = [];
        $val = [];
        foreach($data as $k =>$v){
            $col[] = $k;
            $val[] = "'".$v."'";
        }
        $sql = "INSERT INTO ".$nama_tabel." (".implode(',',$col).") VALUES (".implode(',',$val).")";

        mysqli_query($koneksi, $sql);
    }

    function update_data($koneksi,$nama_tabel,$data,$id,$pk){
        //UPDATE [nama tabel] SET coll=vall, col2=val2, ... WHERE [pk] = [id]
        $sql ="UPDATE $nama_tabel SET ";

        $update = [];
        foreach($data as $col => $val){
            $update[]="$col='$val'";
        }
        $sql .=implode(",",$update);
        $sql.= " WHERE $pk=$id";

        mysqli_query($koneksi,$sql);
    }

    function redirect($page){
        echo "<script>
            window.location.replace('$page');
        </script>";
    }
?>