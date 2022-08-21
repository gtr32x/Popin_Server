import 'cross-fetch/dist/node-polyfill.js';

import pkg from '@apollo/client';
const { ApolloClient, InMemoryCache, gql } = pkg;

var APIURL = 'https://gateway.thegraph.com/api/2734a43d1cfd781604c1a9865658bb6d/subgraphs/id/AVZ1dGwmRGKsbDAbwvxNmXzeEkD48voB3LfGqj5w7FUS';

const client = new ApolloClient({
  uri: APIURL,
  cache: new InMemoryCache(),
})

const tokensQuery = `
  query($id: String, $orderBy: BigInt, $orderDirection: String) {
    account(
      id: $id, orderBy: $orderBy, orderDirection: $orderDirection
    ) {
      ERC721tokens {
        contract {
          id
          name
          symbol
        }
        uri 
        identifier
      }
    }
  }
`

let address = process.argv[2]

client
  .query({
    query: gql(tokensQuery),
    variables: {
      id: address,
      orderBy: 'createdAtTimestamp',
      orderDirection: 'desc',
    },
  })
  .then((data) => {
    let out = []

    for (let nft of data['data']['account']['ERC721tokens']){
      let tmp = {
        'contract': nft['contract']['id'],
        'name': nft['contract']['name'],
        'meta': nft['uri'],
        'id': nft['identifier']
      }

      out.push(tmp)
    }

    console.log(JSON.stringify(out))
  })
  .catch((err) => {
    console.log('Error fetching data: ', err)
  })