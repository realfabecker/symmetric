import fs from "node:fs"
import {CryptoDecryptWithNodeJS} from "../../src/UseCases/CryptoDecryptWithNodeJS.js";
import {CryptoEncryptWithNodeJS} from "../../src/UseCases/CryptoEncryptWithNodeJS.js";
import {Resource} from "../../src/Node/Resource.js";

const encryptUserCase = new CryptoEncryptWithNodeJS();
const encryptedText = encryptUserCase.run()
console.log(`Encrypted: ${encryptedText}`)

const res = new Resource();
res.store('secrets/aes-128-ctr_nodejs.txt', encryptedText);

const decrypt = new CryptoDecryptWithNodeJS();
const decryptedText = decrypt.run(encryptedText);
console.log(`Decrypted: ${decryptedText}`)

const phpEncryptedText = res.read('secrets/aes-128-ctr_php.txt');
if (phpEncryptedText) {
    const phpDecryptedText = decrypt.run(phpEncryptedText);
    console.log(`Decrypted: ${phpDecryptedText}`)
}





