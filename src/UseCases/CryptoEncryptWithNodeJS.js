import path from "node:path";
import {Crypto} from "../Node/Crypto.js";
import { fileURLToPath } from 'node:url';

export class CryptoEncryptWithNodeJS {
    run() {
        const config = {
            alg: "aes-128-ctr",
            key: "lbwyBzfgzUIvXZFS",
            iv_ln: 16
        }
        return (new Crypto())
            .encrypt({text: "text to be encrypted (nodejs)", ...config})
    }
}