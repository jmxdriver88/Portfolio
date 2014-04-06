ABSTRACT: I wrote The Blowfish Project as an exercise to gain a better understanding of encryption and encryption algorithms. 'blowfish.php' essentially does what any routine library encryption function can do: given some plaintext and a key, it returns some encrypted ciphertext, and given some ciphertext and a key, it returns the decrypted plaintext. This program simply follows the algorithm of Bruce Schneier, Blowfish’s creator. NOTE: The program includes 'blowfish.php' as its main algorithm, but the optimized 'blowfish_f.php' and 'blowfish_s.php' may also be used instead.

REQUIREMENTS: This program requires the use of a PHP server.

DISCLAIMER: I wrote this program on an older version of PHP than what is current, so while it ought to work correctly, I reserve the right to make no guarantees about its reliability.

STARTING FILE: 'index.php'

USE: Use of the program is simple. To encrypt, ensure that the ‘Encryption’ button is checked, than enter your key (your password) into the following text field. Check ‘Block of Text’ to type your plaintext directly into the following field, or check ‘File’ to draw your plaintext from a file, entering the file name in the succeeding text field, then click ‘Encrypt’. To decrypt, ensure that the ‘Decryption’ button is checked, than enter your key (your password) into the following text field. Check ‘Block of Text’ to copy your ciphertext directly into the following field, or check ‘File’ to draw your ciphertext from a file, entering the file name in the succeeding text field. Then click ‘Decrypt’.

NOTE: This program is known to have trouble on later PHP systems dealing with decrypting ciphertext directly from the text area. It is more reliable when simply encrypting and decrypting actual files.
