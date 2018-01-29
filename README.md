# Caesar Cipher CLI

A small command-line interface to encrypt and decrypt Caesar Cipher text.

![image](https://nikhilmachcha.files.wordpress.com/2015/09/caesar-cipher.jpg)

##### Usage
```bash
cipher -s "Hello world!" -k 12
```

or

```bash
cipher --string "Hello world!" --key 12
```

output:

```bash
Encrypted: Tqxxa iadxp!
```

decrypt:

```bash
cipher -s "Hello world!" -k 12 -D
```

or

```
cipher --string "Hello world!" --key --decrypt
```

output:

```
Decrypted: Hello world!
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