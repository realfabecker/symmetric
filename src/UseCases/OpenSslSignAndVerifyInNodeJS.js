import {OpenSsl} from "../Node/OpenSsl.js";
import {Resource} from "../Node/Resource.js";

export class OpenSslSignAndVerifyInNodeJS {
    run(privateKey, publicKey, content = 'Hello from JS!') {
        const openSsl = new OpenSsl();
        const signature = openSsl.sign(content, privateKey);
        console.log(`Signature: ${signature}`);

        const verifiedStatus = openSsl.verify(content, signature, publicKey);
        console.log(`Verification: ${verifiedStatus}`)
        
        if (verifiedStatus){
            const res = new Resource();
            res.store('content/content.nodejs.txt', content);
            res.store('content/content.nodejs.sig.txt', signature);
        }
    }
}