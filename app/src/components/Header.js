import React from 'react'

const Header = props => (
  <header style={{marginBottom: 10}}>
    <div>
      <span className="header"> {props.title} </span>
    </div>

    <div className="subheader-body">
      <span className="subheader"> Written by <a className="link">Anwarul Islam</a>. </span>
    </div>
  </header>
)

export default Header