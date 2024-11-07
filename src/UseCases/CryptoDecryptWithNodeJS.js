import {Crypto} from "../Node/Crypto.js";

export class CryptoDecryptWithNodeJS {
    run(e) {
        const config = {
            alg: "aes-128-ctr",
            key: "lbwyBzfgzUIvXZFS",
            iv_ln: 16,
        }
        const c = new Crypto();
        return c.decrypt({encrypted: e, ...config})
    }
}