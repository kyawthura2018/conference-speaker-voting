<?php
session_start();
include 'includes/conn.php';

if(isset($_GET['question_id']) && isset($_GET['vote_type'])){
  include 'includes/functions.php';
  $questionid = $_GET['question_id'];
  $voter = $_SESSION['voter'];
  $vote_type = $_GET['vote_type'];
  $vote = 0;

  if($vote_type == "agree")
  {
    $vote = get_vote_count($vote_type,$questionid,$conn);
    //$vote = get_vote($vote_type,$questionid,$conn);
    $vote += 1;
    $usql = "UPDATE questions SET agree = $vote, priority = $vote  WHERE id = $questionid";
    $prepare = $conn -> prepare($usql);
    $prepare -> execute();

    $vsql = "SELECT * FROM voters WHERE voterid = '$voter'";
      $vresult = $conn->query($vsql);
      while($vrow = $vresult->fetch_assoc())
      {
        if($vrow['votedquestions'] == '')
        {
          $vusql = "UPDATE voters SET votedquestions = '$questionid' WHERE voterid = '$voter'";
          if ($conn->query($vusql)) {
            $_SESSION['success'] = 'You voted a question';
          }
          else {
            $_SESSION['error'] = 'Something was wrong..';
          }

        }
        else {
          $questions = $vrow['votedquestions'].','.$questionid;
          $_SESSION['votedqid'] = $questions;
          $vusql = "UPDATE voters SET votedquestions = '$questions' WHERE voterid = '$voter'";
          if ($conn->query($vusql)) {
            $_SESSION['success'] = 'You voted a question';
          }
        }
      }
  }
  elseif ($vote_type == "disagree") {
    $vote = get_vote_count($vote_type,$questionid,$conn);
    //$vote = get_vote($vote_type,$questionid,$conn);
    $vote += 1;
    $usql = "UPDATE questions SET disagree = $vote, priority = $vote  WHERE id = $questionid";
    $prepare = $conn -> prepare($usql);
    $prepare -> execute();

    $vsql = "SELECT * FROM voters WHERE voterid = '$voter'";
      $vresult = $conn->query($vsql);
      while($vrow = $vresult->fetch_assoc())
      {
        if($vrow['votedquestions'] == '')
        {
          $vusql = "UPDATE voters SET votedquestions = '$questionid' WHERE voterid = '$voter'";
          if ($conn->query($vusql)) {
            $_SESSION['success'] = 'You voted a question';
          }
          else {
            $_SESSION['error'] = 'Something was wrong..';
          }

        }
        else {
          $questions = $vrow['votedquestions'].','.$questionid;
          $_SESSION['votedqid'] = $questions;
          $vusql = "UPDATE voters SET votedquestions = '$questions' WHERE voterid = '$voter'";
          if ($conn->query($vusql)) {
            $_SESSION['success'] = 'You voted a question';
          }
        }
      }
  }
}
else{
  $_SESSION['error'] = 'Something was wrong..';
}
header('location: home.php');

?>
