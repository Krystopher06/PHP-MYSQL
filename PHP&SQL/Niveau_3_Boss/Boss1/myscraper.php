<?php
/* https://fauxid.com/tools/fake-email-list
 */include 'dbMedoo.php';
include 'email_scraper.php';
$url = '';
$emails = '';
//$emaildb = implode($emails, '<br>');
if (isset($_POST['submit'])) {
    $url = $_POST['url'];
    $emails = scrape_email($url);
    foreach ($emails as $row) {
        $database->insert('emails', [
            'email' => $row,

        ]);
    }
}


$dataUtilisateurs = $database->select(
    'emails',
    '*'
);


?>


<form method="POST" action="">
    <div>
        <div>
            <label for="urlSet">Enter an https:// URL: </label>
            <br> <br>
            <input type="text" id="urlSet" name="url" placeholder="https://example.com">
            <span><?PHP   ?></span>

        </div>
        <br>
        <button type="submit" name="submit">Envoyer</button><br><br>
        <span><?PHP ?></span>
    </div>
</form>

<div class="row">
    <div class="col-12">
        <table class=" table table-striped table-light">
            <thead>
                <tr class="">
                   

                    <th>Email</th>

                </tr>
            </thead>
            <tbody>

                <?php foreach ($dataUtilisateurs as $row) { ?>
                    <tr class="">

                     

                        <td><?php echo $row['email']; ?></td>
                    </tr>
                <?php } ?>

            </tbody>