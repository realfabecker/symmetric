import * as crypto from "crypto";

export class Crypto {
    encrypt({text, alg, key, iv_ln}) {
        const iv = crypto.randomBytes(iv_ln);
        const cipher = crypto.createCipheriv(alg, Buffer.from(key), iv)
        const encrypted = Buffer.concat([cipher.update(text), cipher.final()]);
        return iv.toString('hex') + ":" + encrypted.toString("hex");
    }

    decrypt({encrypted, alg, key}) {
        const [iv_hex, txt_hex] = encrypted.split(":")
        const iv = Buffer.from(iv_hex, "hex");
        const txt = Buffer.from(txt_hex, "hex");
        const decipher = crypto.createDecipheriv(alg, Buffer.from(key), iv);
        const decrypted = decipher.update(txt)
        return Buffer.concat([decrypted, decipher.final()]).toString();
    }
}