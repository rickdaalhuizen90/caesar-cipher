# Caesar Cipher CLI

A small command-line interface to encrypt and decrypt Caesar Cipher text.

![image](https://nikhilmachcha.files.wordpress.com/2015/09/caesar-cipher.jpg)

##### Usage
```
Caesar Cipher - help page
Author: github.com/rickdaalhuizen90

Usage:   shell> cipher -s "Hello world!" -k 12
OR:      shell> cipher --string "Hello world!" --key 12
Output:  shell> Encrypted: Tqxxa iadxp!

-s         String that you want to hash
-k         Cipher key
-h         Help page
-D         Decrypt message

--string   String that you want to hash
--key      Cipher key
--help     Help page
--decrypt  Decrypt message
```

##### Requirements
- php >= 5
- [composer](https://getcomposer.org/)

##### install
For OSX and Linux users run:
```bash
chmod +x install && ./install
```

For Windows users:
1. Move this folder to e.g.: C:\Users\<username>\, and name it caesar_cipher.
2. Add this to your PATH environment e.g. set PATH = %PATH%;C:\Users\<username>\caesar_cipher
3. Go to that directory and run "composer install"

##### Uninstall (For OSX and Linux users)
```bash
chmod +x uninstall && ./uninstall
```

##### Source
 - [Caesar Cipher](https://www.programmingalgorithms.com/algorithm/caesar-cipher?lang=PHP)