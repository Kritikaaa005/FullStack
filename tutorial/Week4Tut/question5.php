<form method="POST">
    Enter a sentence: 
    <textarea name="sentence"></textarea>
    <button>Count the Vowels</button>
</form>

<?php
if(isset($_POST['sentence'])){
    $sentence = $_POST['sentence'];
    $vowel_count = 0;

    $sentence = strtolower($sentence); 

    for ($i = 0; $i < strlen($sentence); $i++) {
        if (in_array($sentence[$i], ['a', 'e', 'i', 'o', 'u'])) {
            $vowel_count++;
        }
    }

    echo "The number of vowels in the sentence '$sentence' is: $vowel_count";
}
?>
