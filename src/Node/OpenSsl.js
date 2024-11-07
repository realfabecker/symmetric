import * as crypto from "node:crypto";
import {Hex} from "./Hex.js";

export class OpenSsl {
    verify(content, signature, publicKey) {
        const verify = crypto.createVerify('SHA256')
        verify.update(content)
        verify.end();
        const signatureBuffer = new Hex().hex2bin(signature)
        return verify.verify(publicKey, signatureBuffer)
    }

    sign(content, privateKey) {
        const sign = crypto.createSign('SHA256')
        sign.update(content)
        sign.end();
        return sign.sign(privateKey, 'hex')
    }
}