ABSTRACT: Word Unscrambler is a program I wrote that searches a modest dictionary of English words to attempt to find a word that 'matches' a given scrambled word. It does this by first sorting the scrambled word alphabetically, and then searching the dictionary for words that, when sorted alphabetically as well, match the given sorted word. The dictionary is optimized by dividing into separate categories based on word-length and first-letter, utilizing the facts that a given scrambled word must be of the same length as any “match”, and any 'match' must start with one of the letters in the scrambled word.

REQUIREMENTS: This program requires the use of a PHP server.

DISCLAIMER: I wrote this program on an older version of PHP than what is current, so while it ought to work correctly, I reserve the right to make no guarantees about its reliability.

STARTING FILE: 'index.php'

USE: Use of the program is simple. Simply type in a scrambled word, that you wish to unscramble, into the input field and click Unscramble. The program will return all matches to be found in its dictionary. For convenience, you may also scramble a word by checking the Scramble radio button.

NOTE: 'index_database.php' performs the same function, only it uses a MySQL database named 'unscrambler', which may be imported from the 'database.txt' file.