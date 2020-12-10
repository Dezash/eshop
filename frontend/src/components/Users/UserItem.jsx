import React from 'react';
import { ListItem, ListItemText, Tooltip } from '@material-ui/core';
import PropTypes from 'prop-types';

const UserItem = ({ user }) => {
    return (
        <>
            <ListItem>
                <Tooltip title={user.name}>
                    <ListItemText
                        primary={user.name}
                    />
                </Tooltip>
                <Tooltip title={user.email}>
                    <ListItemText
                        primary={user.email}
                    />
                </Tooltip>
            </ListItem>
        </>
    );
}

UserItem.propTypes = {
    user: PropTypes.shape({
      id: PropTypes.number,
      name: PropTypes.string,
      email: PropTypes.string,
    }).isRequired,
  };
  
  export default UserItem;
