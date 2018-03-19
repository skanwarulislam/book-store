import React, { Component } from 'react';
import Header from './components/Header';
import './App.css';
import searches from './supported-searches.json';
import {BootstrapTable, TableHeaderColumn} from 'react-bootstrap-table';

console.log(searches)

class App extends Component {
  constructor (props) {
    super(props)
    this.state = {books: [], search: "title"}
  }

  componentDidMount () {
    this.getBooks()
  }

  getBooks () {
    fetch(`http://localhost:8080/books/`)
      .then(response => response.json())
      .then(books => this.setState({books}))
      .catch(e => e)
  }

  render() {

      console.log(this.state.books)
      if (this.state.books) {

          return (
              <div className="app">
                <Header title="Books"/>

                <div className="select-container">


                </div>


                <div>
                  <ul>
                      <div>
                          <BootstrapTable data={this.state.books}>
                              <TableHeaderColumn isKey dataField='id'>
                                  ID
                              </TableHeaderColumn>
                              <TableHeaderColumn dataField='title'>
                                  Title
                              </TableHeaderColumn>
                              <TableHeaderColumn dataField='isbn'>
                                  Isbn
                              </TableHeaderColumn>
                          </BootstrapTable>
                      </div>

                  </ul>
                </div>
              </div>
          )
      }
      return null
  }
}

export default App;
