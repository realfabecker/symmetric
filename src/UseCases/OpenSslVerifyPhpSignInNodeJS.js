import {Resource} from "../Node/Resource.js";
import {OpenSsl} from "../Node/OpenSsl.js";
import {Hex} from "../Node/Hex.js";

export class OpenSslVerifyPhpSignInNodeJS {
    run() {
        const res = new Resource()
        if(!res.exists('keys/public.pem')){
            throw new Error('Public key not found');
        }
        const publicKey = res.read('keys/public.pem');
        if(!res.exists('content/content.php.txt')){
            throw new Error('Content file not found');
        }
        const content = res.read('content/content.php.txt')
        if(!res.exists('content/content.php.sig.txt')){
            throw new Error('Signature file not found');
        }
        const signature = res.read('content/content.php.sig.txt');        
        const openSsl = new OpenSsl();
        const verifiedStatus = openSsl.verify(content, signature, publicKey)
        console.log(`Verification (${verifiedStatus})`);
    }
}