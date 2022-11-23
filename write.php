<?php
    #글쓰기
    include "lib.php";
    error_reporting (E_ALL ^ E_NOTICE);

    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "select * from cdh_board where idx='$idx' ";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    // echo $data['name'];
    // exit;

?>

<form action="writepost.php" method="post">
    <input type="hidden" name="idx" value="<?=$idx?>">
    <table width=800 border="1" cellpadding=5>    
        <tr>
            <th> 이름 </th>
            <td> <input type="text" name="name" value="<?=$data['name']?>" > </td>
        </tr>

        <tr>
            <th> 제목 </th>
            <td> <input type="text" name="subject" style="width:100%;" value="<?=$data['subject']?>" > </td>
        </tr>

        <tr>
            <th> 내용 </th>
            <td> 
                <textarea type="text" name="memo" style="width:100%; height:300px;"> <?=$data['memo']?> </textarea>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <div style="text-align:center;">
                    <input type="submit" value="저장">
                </div>
            </td>
        </tr>
    </table>
</form>