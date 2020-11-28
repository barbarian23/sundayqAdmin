<?php
/*
import React from 'react';
import '../assets/css/chat.css';
import { chatKey } from '../constant/chat';

export default class DetailChat extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            isExpande: false,
            unRead: false
        };
    }

    componentDidMount() {
    }

    componentDidUpdate(prevProps) {
        console.log("id", this.props.idOutside, "prevProps", prevProps.showRead, "current ", this.props.showRead);
    }

    render() {
        return (
            <div>
                {
                    this.props.isAdmin ?
                        //nhận
                        <div className="divAdmin" id={this.props.idOutside}>
                            <div className="divAdminImage">
                                <img src={'./assets/images/profile.png'} alt='' />
                            </div>
                            <div className="divAdminRightDetail">
                                <span className="divAdminRightDetailNameUser">{this.props.adminName}</span>
                                <div className="detailAdmin">
                                    <span>{this.props.message}</span>
                                </div>
                            </div>
                        </div>
                        ://gửi
                        <div className="divClient" id={"divClient_" + this.props.idOutside}>
                            <div className="detailClient">
                                <span>{this.props.message}</span>
                                
                            </div>
                            {
                                    this.props.showRead ?
                                            <div className="statusRead" id={"seen_"+this.props.idOutside}>
                                                <span>{chatKey.Seen}</span>
                                            </div>
                                        :
                                        null
                                }
                        </div>
                }
            </div >
        );
    }

}
*/
?>