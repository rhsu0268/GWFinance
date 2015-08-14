<!-- apology.php -->
<!-- This is a file that apologizes to the user when there is error. -->

<p class="lead text-danger">
    Sorry!
</p>
<p class="text-danger">
    <?= htmlspecialchars($message) ?>
</p>

<a href="javascript:history.go(-1);">Back</a>
