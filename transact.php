<?php
sql_begin_transaction();

try {
    $query = "select loanseq from loanidseq where gsid=? for update";
    $rs = sql_prep($query, $db, $gsid);
    $myrow = sql_fetch_assoc($rs);
    $loanseqid = $myrow['loanseq'] + 1;

    $query = "insert into loans(loanseqid) values (?)";
    sql_prep($query, $db, $loanseqid);

    $query = "update loanidseq set loanseq=? where gsid=?";
    sql_prep($query, $db, array($loanseqid, $gsid));

    sql_commit();
} catch (Exception $e) {
    sql_rollback();
}