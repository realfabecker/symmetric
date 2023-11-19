## Criptografia

A criptografia é uma estrateǵia utilizada no campo de cyber security de modo a manter dados protegidos fora do alcance
de invasores transformando texto plano em um código que possa ser entendido apenas por alguém que possuir a chave para
traduzir o código para seu formato em texto original.

A criptografia também pode ser entendida como um processo matemático qual realiza o cálculo de um texto cifrado a partir
de um texto plano de entrada utilizando algoritmos complexos tornando o resultado impraticável de reverter sem a posse
da chave utilizada para gerar o texto cifrado no primeiro momento.

Esse processo pode ser realizado de maneira síncrona, onde a mesma chave é utilizada para criptografar e descriptografar
um dado a ser protegido, ou de maneira assíncrona onde chaves diferentes são utilizadas em ambos os processos.

## Advanced Encryption Standard (AES)

O Advanced Encryption Standard (AES) é um algoritmo de criptografia simétrica qual realiza a geração da cifra a partir
da quebra da mensagem original em blocos sendo cada um cifrado por diversas rodadas de criptografia sendo esse número
definido pelo tamanho da chave utilizada na definição do uso do algoritmo.

Se definido uma chave de 128 bits, são utilizados 10 rodadas de criptografias, enquanto chaves de 192 bits utilizam 12 e
chaves com 256 bits utilizam 14 rodadas, tornando o resultado extremamente difícil de ser obtido por meio de ataques de
força bruta considerando a capacidade computacional qual temos disponível na atualidade.

A dificuldade da quebra de uma cifra aumenta proporcionalmente ao tamanho da chave utilizada, porém, recomenda-se o uso
de chaves de 128 bits (AES-128) na maioria dos casos visto esta ser segura o suficiente para maior parte das aplicações
consumidoras e por o AES-256 requerer uma capacidade computacional consideravelmente maior.

### Cipher Block Chaining (CBC)

De modo a prover segurança criptográfica, cada processo de criptografação de um mesmo plain text deve resultar em uma
cipher text diferente. O modo de operação CBC (Cipher Block Chaining) disponibiliza essa funcionalidade por meio de um
vetor de inicialização com tamanho idêntico ao de um bloco a ser criptografado, sendo esse denominado como IV.

![aes-cbc](./resources/images/aes-cbc.png)

Na primeira etapa da criptografia o prefixo IV é utilizado em combinação do texto plano do primeiro block em conjunto
com a chave para obtenção da primeira parcela cifrada. Esse resultado é utilizado como base para combinação do próximo,
repetindo-se o processo para os próximos blocos.

Dessa maneira são obtidos blocos criptografados diferentes, mesmo ses textos idênticos forem fornecidos como entrada
para o algoritmo no processo de criptografação.

### Counter (CTR)

No modo de operação Counter (CTR) é utilizado um valor contador como vetor de inicialização. Os valores utilizados para
o contador nesse modo são independentes da saída de blocos prévios, permitindo assim paralelismo tanto na criptografia
quando da descriptografia de dados protegidos.

![aes-ctr](./resources/images/aes-ctr.png)