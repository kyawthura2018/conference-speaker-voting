<?php
function get_vote_count($vote_type,$post_id,$con){
        // $query = $con -> prepare("SELECT $vote_type FROM questions WHERE id=$post_id");
        // $query -> execute();
        // $data = $query -> fetch();
        //return $data[$vote_type];
        $sql = "SELECT $vote_type FROM questions WHERE id = '$post_id'";
        $result = $con->query($sql);
        $vote = 0;
        while($row = $result->fetch_assoc())
        {
           $vote = $row[$vote_type];
        }
        return $vote;
    }

    function get_vote($vote_type,$post_id,$con){
        $query = $con -> prepare("SELECT $vote_type FROM questions WHERE id=$post_id");
        $query -> execute();
        $data = $query -> fetch();
        return $data[$vote_type];
    }

    function get_votedquestions($voterid, $conn)
    {
      $vsql = "SELECT votedquestions FROM voters WHERE voterid = $voterid";
      $result = $conn->query($vsql);
      while ($row = $result->fetch_assoc()) {
        $qids = $row['votedquestions'];
      }

      return $qids;
    }


 ?>
