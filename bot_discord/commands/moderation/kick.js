const {
    ApplicationCommandOptionType,
    PermissionFlagsBits,
  } = require('discord.js');
  
  module.exports = {
    callback: async (client, interaction) => {

      if(!targetUser){
        await interaction.editReply("That user doesnt't exist in this server.");
        return;
      }

      if(targetUser.id === interaction.guild.ownerId) {
        await interaction.editReply("You can't kick the server owner.");
        return;
      }

      const targetUserRolePosition = targetUser.roles.highest.position;
      const requestUserRolePosition = interaction.member.roles.highest.position;
      const botRolePosition = interaction.guild.members.me.roles.highest.position;

      if(targetUserRolePosition >= requestUserRolePosition){
        await interaction.editReply("You can't kick that user because they have the same/higher role than you.");
        return;
      }
      if(targetUserRolePosition >= botRolePosition){
        await interaction.editReply("I can't kick that user because they have the same/higher role than me.");
        return;
      }

      try {
        await targetUser.kick({ reason });
        await interaction.editReply(`User ${targetUser} was kicked\nReason: ${reason}`);
      } catch (error) {
        console.log(`There was an error when kicking ${error}.`)
      }
    },

    //deleted: true,
    name: 'kick',
    description: 'Kicks a member!!!',
    // devOnly: Boolean,
    // testOnly: Boolean,
    options: [
      {
        name: 'target-user',
        description: 'The user to kick.',
        required: true,
        type: ApplicationCommandOptionType.Mentionable,
      },
      {
        name: 'reason',
        description: 'The reason for thenkick.',
        type: ApplicationCommandOptionType.String,
      },
    ],
    permissionsRequired: [PermissionFlagsBits.KickMembers],
    botPermissions: [PermissionFlagsBits.KickMembers],
  
  };