import {Resource} from "../Node/Resource.js";
import {OpenSsl} from "../Node/OpenSsl.js";
import {Hex} from "../Node/Hex.js";

export class OpenSslVerifyPhpSignInNodeJS {
    run() {
        const res = new Resource()

        const publicKey = res.read('keys/public.pem');
        const content = res.read('content/content.php.txt')
        const signature = res.read('content/content.php.sig.txt');
        
        const openSsl = new OpenSsl();
        const verifiedStatus = openSsl.verify(content, signature, publicKey)
        console.log(`Verification (${verifiedStatus})`);
    }
}