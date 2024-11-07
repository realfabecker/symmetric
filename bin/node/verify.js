//import {OpenSslVerifyPhpSignInNodeJS} from "../../src/UseCases/OpenSslVerifyPhpSignInNodeJS.js";
import {OpenSslSignAndVerifyInNodeJS} from "../../src/UseCases/OpenSslSignAndVerifyInNodeJS.js";
import {Resource} from "../../src/Node/Resource.js";

//new OpenSslVerifyPhpSignInNodeJS().run();

const privateKey = new Resource().read('keys/private.pem');
const publicKey = new Resource().read('keys/public.pem');
new OpenSslSignAndVerifyInNodeJS().run(privateKey, publicKey)