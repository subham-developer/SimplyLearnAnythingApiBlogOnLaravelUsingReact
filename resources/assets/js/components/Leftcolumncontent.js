import React, { Component } from 'react';

export default class Leftcoulmncontent extends Component {
    constructor(props){
        super()
    }
    render() {
        return (
            <div className="leftcolumn">
                <div className="card">
                <h2>{this.props.title}</h2>
                <h5>Title description, Dec 7, 2017</h5>
                <div className="fakeimg" style={{height:"200px"}}>Image</div>
                <p>Some text..</p>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
                </div>
            </div>
        );
    }
}









                