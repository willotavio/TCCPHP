const transactionsU1 = document.querySelector('#transactions')

const incomeDisplay = document.querySelector('#money-plus')

const expenseDisplay = document.querySelector('#money-minus')

const balanceDisplay = document.querySelector('#balance')

const form = document.querySelector('#form')

const inputTransactionName = document.querySelector('#text')

const inputTransactionAmount = document.querySelector('#amount')





const localStoragaTransactions = JSON.parse(localStorage

    .getItem('transactions'))

let transactions = localStorage

    .getItem('transactions') !== null ? localStoragaTransactions : []




/*paratransaction receber as transações que ele já tem */

const removeTransaction = ID => {

    transactions = transactions.filter(transaction =>

        transaction.id !== ID)

    updateLocalStorage()

    init()

}




const addTransactionIntoDOM = ({ amount, name, id }) => {

    const operator = amount < 0 ? '-' : '+'

    const CSSClass = amount < 0 ? 'minus' : 'plus'

    const amountWithoutOperator = Math.abs(amount)

    const li = document.createElement('li')




    li.classList.add(CSSClass)

    li.innerHTML = `  

${name}  

<span>${operador} R$ ${amountWithoutOperator} </span><button class="delete-btn" onClick="removeTransaction(${id})">x</button>  

`

    transactionsU1.append(li)






}




const getExpenses = transactionsAmounts => Math.abs(transactionsAmounts

    .filter(value => value < 0)

    .reduce((accumulator, value) => accumulator + value, 0))

    .toFixed(2)





const getIncome = transactionsAmounts => transactionsAmounts

    .filter(value => value > 0)

    .reduce((accumulator, value) => accumulator + value, 0)

    .toFixed(2)





const getTotal = transactionsAmounts => transactionsAmounts

    .reduce((accumulator, transaction) => accumulator + transaction, 0)

    .toFixed(2)





const updateBalanceValues = () => {

    const transactionsAmounts = transactions.map(({ amount }).amount)

    const total = getTotal(transactionsAmounts)

    const income = getIncome(transactionsAmounts)

    const expense = getExpenses(transactionsAmounts)











    balanceDisplay.textContent = `R$ ${total}`

    incomeDisplay.textContent = `R$ ${income}`

    expenseDisplay.textContent = `R$ ${expense}`





}

const init = () => {

    transactionsU1.innerHTML = ''

    transaction.forEach(addTransactionIntoDOM)

    updateBalanceValues()




}











init()




const updateLocalStorage = () => {

    localStorage.setItem('transactions', JSON.stringify(transactions))

}




const generateID = () => Math.round(Math.random() * 1000)




const addToTransactionsArry = (transactionName, transactionsAmount) => {

    transactions.push({

        id: generateID(),

        name: 'transactionName ',

        amount: Number(transactionsAmount)

    })

}




const cleanInputs = () => {

    inputTransactionName.value = ''

    inputTransactionAmount.value = ''

}




const handleFormSubmit = event => {




    /*nessa linha estamos impedindo que o form seja enviado , e a página seja recarregada*/

    event.preventDefault()




    /*nessas duas linhas do const estamos criando duas const com os valores inseridos no input*/

    const transactionName = inputTransactionName.value.trim()

    const transactionAmount = inputTransactionAmount.value.trim()

    const isSomeInputEmpty = transactionName === '' || transactionAmount.value === ''




    /*nesse if estamos vereficando se alguns dos inputs não foi preenchido e exibindo uma mensagem na tela*/

    if (isSomeInputEmpty) {

        alert('por favor, preencha tanto o nome quanto o valor da transação')

        return




    }



    /* com o pedaço de código do "const transaction até o transaction.push" , podemos criar uma função que vai adicionar a transação em uma rede trasações*/




    /*objeto que representa a transação*/



    /*aqui estamos criando  a transação e adicionando ela em uma rede de transações*/




    /*const transaction = {   

    id:generateID(),  

    name: 'transactionName ',  

    amount:Number(transactionsAmount)  

 
 

}  

 
 

transaction.push(transaction) */




    /*invocamos a init para atualizar as transações na tela e atualiza o LocalStorage, e limpa os inputs*/

    addToTransactionsArray(transactionName, transactionsAmount)

    init()

    updateLocalStorage()

    cleanInputs()

}




form.addEventListener('submit', handleFormSubmit)






